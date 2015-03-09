<?php

namespace BoardSoc\Repositories;


use BoardSoc\BoardGameGeekGame;
use Guzzle\Http\Client;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use SimpleXMLElement;

class BoardGameGeekRepository
{
    const BOARD_GAME_URL = "http://www.boardgamegeek.com/xmlapi/boardgame/";
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

            $game = new BoardGameGeekGame();
            $game->id = (string) $element['objectid'];
            $game->minplayers = $element->minplayers;
            $game->maxplayers = $element->maxplayers;
            $game->image = $element->image;
            $game->name = $this->getName($element->name);
            $game->save();
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

}