<?php

namespace Database\Seeders;

use App\Models\Editor;
use App\Models\Reporter;
use Illuminate\Database\Seeder;

class ReporterEditorSeeder extends Seeder
{
    public function run(): void
    {
        // Seed Reporters
        $reporters = [
            'Ahmad Journalist',
            'Budi Reporter',
            'Citra News',
            'Dian Media',
            'Erik Press',
        ];

        foreach ($reporters as $reporter) {
            Reporter::create(['nama' => $reporter]);
        }

        // Seed Editors
        $editors = [
            'Fajar Editor',
            'Gina Publishing',
            'Hadi Review',
            'Indah Draft',
            'Joko Final',
        ];

        foreach ($editors as $editor) {
            Editor::create(['nama' => $editor]);
        }
    }
}
