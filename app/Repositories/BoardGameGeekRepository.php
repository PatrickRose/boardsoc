<?php

namespace BoardSoc\Repositories;


use BoardSoc\BoardGameGeekGame;
use Guzzle\Http\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use SimpleXMLElement;

class BoardGameGeekRepository
{
    const BOARD_GAME_URL = "http://www.boardgamegeek.com/xmlapi/boardgame/";

    const SEARCH_GAMES = 'http://www.boardgamegeek.com/xmlapi/search';

    const USER_GAMES = 'http://www.boardgamegeek.com/xmlapi/collection/';
    /**
     * @var Client
     */
    private $client;

    function __construct(Client $client)
    {
        $this->client = $client;
    }


    public function get($id)
    {
        try
        {
            $game = BoardGameGeekGame::findOrFail($id);
        }
        catch (ModelNotFoundException $e)
        {
            $req = $this->client->get(self::BOARD_GAME_URL . $id);
            $req->getQuery()->set('versions', '1');

            $res = $req->send();

            $element = $res->xml()->boardgame;

            if ($element->error) {
                throw new \Exception('Game not found at BoardGameGeek');
            }

            $game = $this->makeGameFromXML($element);
        }

        return $game;
    }

    private function getName(SimpleXMLElement $names)
    {
        foreach ($names as $name) {
            if (isset($name['primary'])) {
                return (string)$name;
            }
        }

        return (string)$names[0];
    }

    /**
     * @param $searchTerm
     * @return \BoardSoc\BoardGameGeekGame[]|Collection
     */
    public function search($searchTerm)
    {
        $req = $this->client->get(self::SEARCH_GAMES);
        $req->getQuery()->set('search', $searchTerm);

        $res = $req->send();
        $xml = $res->xml();

        $ids = [];

        foreach($xml->boardgame as $boardgame)
        {
            $ids[] = $boardgame['objectid'];
        }

        return $this->getMany($ids);
    }

    /**
     * Get many games
     *
     * @param array $ids
     * @return BoardGameGeekGame[]|Collection
     */
    public function getMany(array $ids)
    {
        $games = BoardGameGeekGame::whereIn('id', $ids)->get();

        // If we have them all...
        if (count($games) == count($ids))
        {
            return $games;
        }

        // Otherwise we have to find them
        $ids = array_filter($ids, function($id) use ($games)
        {
            foreach($games as $game)
            {
                if ($id == $game->id)
                {
                    return false;
                }
            }
            return true;
        });

        $req = $this->client->get(self::BOARD_GAME_URL . implode(',', $ids));
        $req->getQuery()->set('versions', '1');

        $res = $req->send();
        $xml = $res->xml();

        foreach ($xml->boardgame as $boardGame)
        {
            $game = $this->makeGameFromXML($boardGame);
            $games->add($game);
        }

        return $games;
    }

    /**
     * @param SimpleXMLElement $element
     * @return BoardGameGeekGame
     */
    protected function makeGameFromXML(SimpleXMLElement $element)
    {
        $game = new BoardGameGeekGame();
        $game->id = (string)$element['objectid'];
        $game->minplayers = $element->minplayers;
        $game->maxplayers = $element->maxplayers;
        $game->image = $element->image;
        $game->name = $this->getName($element->name);
        $game->save();
        return $game;
    }

    /**
     * @param string $username
     * @return \BoardSoc\BoardGameGeekGame[]|Collection
     */
    public function getUserGames($username)
    {
        $url = self::USER_GAMES . $username;

        $req = $this->client->get($url);
        $req->getQuery()->set('own', 1);

        $res = $req->send();
        $xml = $res->xml();

        if (!count($xml->item))
        {
            return $this->getUserGames($username);
        }

        $ids = [];
        foreach($xml->item as $item)
        {
            $ids[] = $item['objectid'];
        }

        return $this->getMany(array_unique($ids));
    }

}