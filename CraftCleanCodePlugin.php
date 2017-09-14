<?php
namespace Craft;

class CraftCleanCodePlugin extends BasePlugin {
    function getName() {
         return Craft::t('Craft Clean Code');
    }

    function getVersion() {
        return '1.0.4';
    }

    function getDeveloper() {
        return 'Kisu';
    }

    public function getDescription() {
        return Craft::t('Adds a code fieldtype.');
    }

    public function getDocumentationUrl() {
        return 'https://github.com/xkisu/craftcleancode/blob/master/README.md';
    }

    public function getReleaseFeedUrl() {
        return 'https://raw.githubusercontent.com/xkisu/craftcleancode/master/releases.json';
    }

    function getDeveloperUrl() {
        return 'http://keithcod.es';
    }
}