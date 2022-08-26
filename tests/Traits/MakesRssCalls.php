<?php

namespace Tests\Traits;

use Carbon\Carbon;
use Faker\Factory as Faker;
use SimplePie\SimplePie;
use XMLWriter;

trait MakesRssCalls
{
    public function fakeRssCall(int $limit = 10, string $title = 'Test')
    {
        $response = $this->generateRssResponse($limit, $title);

        return $response;
    }

    private function generateRssResponse(int $limit = 10, string $title = 'Test')
    {
        $rss = $this->generateRssData($limit, $title);

        return $this->parseRssData($rss);
    }

    private function generateRssData($limit, $title)
    {
        $faker = Faker::create();

        $rss = new XMLWriter();
        $rss->openMemory();
        $rss->startDocument();
        $rss->startElement('rss');
        $rss->writeAttribute('version', '2.0');
        $rss->startElement('channel');
        $rss->writeElement('generator', 'NFE/5.0');
        $rss->writeElement('title', "Random RSS Generator - {$title}");
        $rss->writeElement('link', $faker->url());
        $rss->writeElement('language', 'en-US');
        $rss->writeElement('webMaster', $faker->email());
        $rss->writeElement('copyright', 'Fake RSS, 2022');
        $rss->writeElement('lastBuildDate', Carbon::now());
        $rss->writeElement('description', "Random {$title} news");
        for ($i = 0; $i < $limit; ++$i) {
            $rss->startElement('item');
            $rss->writeElement('title', $faker->sentence());
            $rss->writeElement('link', $faker->url());
            $rss->writeElement('guid', $faker->bothify('?????#???##########??????##??##????????????'));
            $rss->writeElement('pubDate', $faker->dateTimeBetween('-1 week')->format('Y-m-d H:i:s'));
            $rss->writeElement('description', $faker->paragraph());
            $rss->writeElement('source', $faker->randomElement(['Apple Inc.', 'Google Inc.', 'Associated Press', 'Foxy News', 'MSNS News', 'New Yorky Times', 'Bad Times Inc.']));
            $rss->writeElementNs('media', 'description', null, $faker->sentence());
            $rss->endElement();
        }
        $rss->endElement();
        $rss->endElement();
        $rss->endDocument();


        return $rss->flush();
    }

    private function parseRssData(string $rss)
    {
        $feed = $this->app->make(SimplePie::class);
        $feed->set_raw_data($rss);
        $feed->init();
        $feed->handle_content_type();

        return $feed;
    }
}
