<?php

namespace Tests\Traits;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Support\Collection;
use SimplePie\SimplePie;
use XMLWriter;

trait MakesRssCalls
{
    public function fakeRssCall(int $limit = 10, string $title = 'Test'): SimplePie
    {
        $response = $this->generateRssResponse($limit, $title);

        return $response;
    }

    public function fakeRssItems(int $limit = 10, string $title = 'Test'): Collection
    {
        $response = $this->generateRssResponse($limit, $title);

        return collect($response->get_items())->forPage(1, $limit);
    }

    private function generateRssResponse(int $limit = 10, string $title = 'Test')
    {
        $rss = $this->generateRssData($limit, $title);

        return $this->parseRssData($rss);
    }

    private function generateRssData($limit, $title): string
    {
        $faker = Faker::create();

        $rss = new XMLWriter();
        $rss->openMemory();
        $rss->setIndent(true);
        $rss->startDocument('1.0', 'UTF-8');
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
            $rss->writeElement('source', $faker->randomElement(['Manzana Inc.', 'Googleee Inc.', 'Associated Pressa', 'Foxy News', 'MSNSNS News', 'New Yorky Times', 'Bad Times Inc.']));
            $rss->startElementNs('media', 'description', 'http://search.yahoo.com/mrss/');
            $rss->writeAttribute('type', 'html');
            $rss->text($faker->sentence);
            $rss->endElement();
            $rss->startElementNs('media', 'thumbnail', 'http://search.yahoo.com/mrss/');
            $rss->writeAttribute('url', $faker->imageUrl());
            $rss->writeAttribute('height', 169);
            $rss->writeAttribute('width', 300);
            $rss->writeAttribute('medium', 'image');
            $rss->endElement();
            $rss->endElement();
        }
        $rss->endElement();
        $rss->endElement();
        $rss->endDocument();

        return $rss->flush();
    }

    private function parseRssData(string $rss): SimplePie
    {
        $feed = $this->app->make(SimplePie::class);
        $feed->set_raw_data($rss);
        $feed->init();
        $feed->handle_content_type();

        return $feed;
    }
}
