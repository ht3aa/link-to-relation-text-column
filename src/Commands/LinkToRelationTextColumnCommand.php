<?php

namespace Ht3aa\LinkToRelationTextColumn\Commands;

use Illuminate\Console\Command;

class LinkToRelationTextColumnCommand extends Command
{
    public $signature = 'link-to-relation-text-column';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
