<?php

use App\Filament\Resources\BookResource;
use App\Models\Book;
use Filament\Actions\ReplicateAction;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Livewire\livewire;

uses(RefreshDatabase::class);

test('replicate test', function () {
    $book = Book::factory()->create([
        'title' => 'old title',
    ]);
    livewire(BookResource\Pages\ListBooks::class)
        ->callTableAction(ReplicateAction::class, $book->id);

    expect(Book::count())->toBe(2);

    $book = Book::find(2);

    expect($book->title)->toBe('New Title Book');
});
