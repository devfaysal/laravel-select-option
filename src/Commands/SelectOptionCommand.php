<?php

namespace Devfaysal\SelectOption\Commands;

use Illuminate\Console\Command;

class SelectOptionCommand extends Command
{
    public $signature = 'laravel-select-option';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
