<?php
/**
 * Generate SQL code for indexes creation.
 * @param array $schema column schema
 * @return string SQL query
 */
function strayfModCreateIndexes(array $schema)
{
  $statement = null;
  if (true === isset($schema['indexes']))
  {
    foreach ($schema['indexes'] as $key => $elem)
    {
      $statement .= 'CREATE INDEX ' . $key . ' ON ' . $schema['name'] . ' (';
      foreach ($elem as $subElem)
        $statement .= $schema['columns'][$subElem]['name'] . ', ';
      $statement = substr($statement, 0, -2) . ');';
    }
  }
  return $statement;
}
