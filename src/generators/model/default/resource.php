<?php
/**
 * This is the template for generating the model class of a specified table.
 */

/** @var yii\web\View $this */
/** @var InterNation\gii\generators\model\Generator $generator */
/** @var string $tableName full table name */
/** @var string $className class name */
/** @var string $modelClassName class name */
/** @var string $queryClassName query class name */
/** @var yii\db\TableSchema $tableSchema */
/** @var array $properties list of properties (property => [type, name. comment]) */
/** @var string[] $labels list of attribute labels (name => label) */
/** @var string[] $rules list of validation rules */
/** @var array $relations list of relations (name => relation declaration) */

echo "<?php\n";
?>

namespace <?= $generator->resourceNs ?>;

use Yii;
<?php
foreach ($relations as $name => $relation): ?>
    use <?= $generator->ns . '\\' . $relation[1] ?>;
<?php
endforeach; ?>
use <?= $generator->ns . '\\' . $modelClassName ?>;
/**
* This is the model class for table "<?= $generator->generateTableName($tableName) ?>".
*
*/
class <?= $className ?> extends <?= $modelClassName . "\n" ?>
{
<?php
foreach ($relations as $name => $relation): ?>

    /**
    * Gets query for [[<?= $name ?>]].
    *
    * @return <?= $relationsClassHints[$name] . "\n" ?>
    */
    public function get<?= $name ?>()
    {
    <?= $relation[0] . "\n" ?>
    }
<?php
endforeach; ?>
}
