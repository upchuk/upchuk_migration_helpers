<?php

namespace Drupal\upchuk_migration_helpers\Commands;

use Drupal\Core\Serialization\Yaml;
use Drush\Commands\DrushCommands;

class MigrationCommands extends DrushCommands {

  /**
   * Generates the YAML representation of the CSV headers.
   *
   * Just run the command with one argument: the relative path to the CSV file.
   *
   * @param $file
   *   The relative path to the file
   *
   * @command generate-migration-column-headers
   */
  public function generateYaml($file) {
    $spl = new \SplFileObject($this->getConfig()->cwd() . DIRECTORY_SEPARATOR . $file, 'r');
    $spl->next();
    $headers = $spl->fgetcsv();

    $source_headers = [];
    foreach ($headers as $header) {
      $source_headers[] = [$header => $header];
    }

    $yml = Yaml::encode($source_headers);
    $this->output()->write($yml);
  }

}
