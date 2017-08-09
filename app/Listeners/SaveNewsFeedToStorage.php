<?php

namespace App\Listeners;

use App\Events\DownloadNewsFeedsEvent;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

/**
 * Class SaveNewsFeedToStorage
 * @package App\Listeners
 */
class SaveNewsFeedToStorage
{
    /**
     * Directory relative to storage root of this app,
     * used to download all newsfeeds into it.
     */
    const PATH_TO_FILE = './newsfeeds/';

    /**
     * Download the newsfeed file to storage
     * and persist to database.
     *
     * @param  DownloadNewsFeedsEvent  $event
     * @return void
     */
    public function handle(DownloadNewsFeedsEvent $event)
    {
        $file = false;

        // get file from remote, return body from response
        if ($event) {
            $file = $this->getFileFromRemote(
                $event->newsfeed->getAttributeValue('deeplink')
            );
        }

        // save file to app storage
        if ($file !== false) {
            $this->saveFileToStorage(
                $file,
                $event->newsfeed->getAttributeValue('local_file')
            );
        }
    }

    /**
     * Get file body from remote and return it.
     *
     * @param $deeplink
     * @return bool|string
     */
    private function getFileFromRemote($deeplink)
    {
        $client = new Client();
        $response = $client->request('GET', $deeplink);

        if ($response->getStatusCode() === 200) {
            return $response->getBody();
        }

        return false;
    }

    /**
     * Save requested body as a file in local storage,
     * delete file with same name before if exists.
     *
     * @param $file
     */
    private function saveFileToStorage($file, $filename)
    {
        $this->deleteFileIfExists($filename);
        $this->saveFile($file, $filename);
    }

    /**
     * Delete File if exists.
     *
     * @param $filename
     * @return bool
     */
    private function deleteFileIfExists($filename): bool
    {
        return Storage::delete(self::PATH_TO_FILE . $filename);
    }

    /**
     * Save file with given filename and body from request.
     *
     * @param $file
     * @param $filename
     * @return bool
     */
    private function saveFile($file, $filename): bool
    {
        return Storage::put(self::PATH_TO_FILE . $filename, $file);
    }
}
