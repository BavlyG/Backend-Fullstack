<?php

namespace App\Actions;

class ChangeRecordStatus
{
    public function handle(string $model, int $id, bool $value, string $columnName = 'status'): bool
    {
        $record = (new $model)::where('id', $id)->first();
        if ($record) {
            $record->update([$columnName => (int) $value]);

            return true;
        }

        return false;
    }
}
