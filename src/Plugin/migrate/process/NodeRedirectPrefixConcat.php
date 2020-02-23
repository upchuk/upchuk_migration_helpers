<?php

namespace Drupal\upchuk_migration_helpers\Plugin\migrate\process;

use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Concatenates the incoming value (a Node ID) with the internal path prefix: internal:/node/[nid]
 *
 * Used for the redirect migration.
 *
 * @MigrateProcessPlugin(
 *   id = "node_redirect_prefix_concat",
 * )
 */
class NodeRedirectPrefixConcat extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    return 'internal:/node/' . $value;
  }
}
