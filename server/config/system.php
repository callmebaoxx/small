<?php

return [
    'created_at_column' => ['field' => 'ins_datetime', 'comment' => 'Inserted datetime'],
    'updated_at_column' => ['field' => 'upd_datetime', 'comment' => 'Updated datetime'],
    'deleted_at_column' => [],
    'del_flag_column' => ['field' => 'delete_flag', 'comment' => 'Delete flag', 'active' => 0, 'deleted' => 1],
    'created_by_column' => ['field' => 'ins_id', 'comment' => 'CreatedID'],
    'updated_by_column' => ['field' => 'upd_id', 'comment' => 'UpdatedID'],
    'deleted_by_column' => [],
];