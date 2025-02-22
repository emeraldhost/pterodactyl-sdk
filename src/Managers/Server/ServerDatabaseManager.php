<?php

namespace HCGCloud\Pterodactyl\Managers\Server;

use HCGCloud\Pterodactyl\Managers\Manager;
use HCGCloud\Pterodactyl\Resources\Collection;
use HCGCloud\Pterodactyl\Resources\ServerDatabase;

class ServerDatabaseManager extends Manager
{
    /**
     * Get a paginated collection of server databases.
     *
     * @param mixed $serverId
     * @param int   $page
     * @param array $query
     *
     * @return Collection
     */
    public function paginate($serverId, int $page = 1, array $query = [])
    {
        return $this->http->get("servers/$serverId/databases", array_merge([
            'page' => $page,
        ], $query));
    }

    /**
     * Get a server database instance.
     *
     * @param mixed $serverId
     * @param int   $databaseId
     * @param array $query
     *
     * @return ServerDatabase
     */
    public function get($serverId, string $databaseId, array $query = [])
    {
        return $this->http->get("servers/$serverId/databases/$databaseId", $query);
    }

    /**
     * Create a new database for a server.
     *
     * @param mixed $serverId
     * @param array $data
     *
     * @return ServerDatabase
     */
    public function create($serverId, array $data)
    {
        return $this->http->post("servers/$serverId/databases", [], $data);
    }

    /**
     * Reset password for a specified database of a server.
     *
     * @param mixed $serverId
     * @param int   $databaseId
     *
     * @return void
     */
    public function resetPassword($serverId, string $databaseId)
    {
        return $this->http->post("servers/$serverId/databases/$databaseId/reset-password");
    }

    /**
     * Delete the given database of a server.
     *
     * @param mixed $serverId
     * @param int   $databaseId
     *
     * @return void
     */
    public function delete($serverId, string $databaseId)
    {
        return $this->http->delete("servers/$serverId/databases/$databaseId");
    }
}
