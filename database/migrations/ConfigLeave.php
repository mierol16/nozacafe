<?php

class ConfigLeave
{
    protected $table = 'config_leave';

    public function up()
    {
        $column =  [
            'config_leave_id' => array(
                'type' => 'BIGINT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE,
            ),
            'leave_id' => array(
                'type' => 'BIGINT',
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'preset_id' => array(
                'type' => 'BIGINT',
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'leave_duration' => array(
                'type' => 'DECIMAL',
                'length' => '10,1',
                'null' => TRUE,
                'rename' => 'preset_duration',
            ),
            'leave_year' => array(
                'type' => 'VARCHAR',
                'length' => 15,
                'null' => TRUE,
            ),
            'user_id' => array(
                'type' => 'BIGINT',
                'unsigned' => TRUE,
                'comment' => 'Refer table user',
                'null' => TRUE
            ),
        ];

        $key = [
            1 => ['type' => 'PRIMARY KEY', 'reference' => 'config_leave_id'],
            2 => ['type' => 'INDEX', 'reference' => 'user_id'],
            3 => ['type' => 'INDEX', 'reference' => 'leave_id'],
            4 => ['type' => 'INDEX', 'reference' => 'preset_id'],
        ];

        migrate($this->table, $column, $key);
        echo "Table <b style='color:red'><i>{$this->table}</i></b> migrate running succesfully <br>";
    }

    public function down()
    {
        dropTable($this->table);
        echo "Table <b style='color:red'><i>{$this->table}</i></b> drop succesfully <br>";
    }

    public function relation()
    {
        $relation = [
            'CONFIG_LEAVE_USER' => array(
                'FOREIGN_KEY' => 'user_id',
                'REFERENCES_TABLE' => 'user',
                'REFERENCES_KEY' => 'user_id',
                'ON_DELETE' => 'CASCADE',
                'ON_UPDATE' => 'NO ACTION',
            ),
            'CONFIG_LEAVE' => array(
                'FOREIGN_KEY' => 'leave_id',
                'REFERENCES_TABLE' => 'master_leave',
                'REFERENCES_KEY' => 'leave_id',
                'ON_DELETE' => 'CASCADE',
                'ON_UPDATE' => 'NO ACTION',
            ),
            'CONFIG_PRESET' => array(
                'FOREIGN_KEY' => 'preset_id',
                'REFERENCES_TABLE' => 'preset_leave',
                'REFERENCES_KEY' => 'preset_leave_id',
                'ON_DELETE' => 'CASCADE',
                'ON_UPDATE' => 'NO ACTION',
            ),
        ];

        addRelation($this->table, $relation);
        echo "Table <b style='color:red'><i>{$this->table}</i></b> relation added <br>";
    }
}

// type => INT, TINYINT, BIGINT, CHAR, VARCHAR, TEXT, DATE, YEAR, TIMESTAMP, DATE, TIME, DATETIME, DECIMAL, FLOAT, BOOLEAN, ENUM
// unsigned => TRUE / FALSE
// auto_increment => TRUE / FALSE
// null => TRUE / FALSE
// length
// comment
// default
// rename => (only use to change column name)
// after => (add column after tablename)
// drop => TRUE (remove if dont want to drop)