<?php

namespace Ht3aa\LinkToRelationTextColumn;

use Filament\Facades\Filament;
use Filament\Support\Enums\IconPosition;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class LinkToRelationTextColumn extends TextColumn
{
    public function setup(): void
    {
        $this->url(function ($record, TextColumn $component) {
            $relation = $record->{$this->getName()};

            if (is_null($relation)) {
                return null;
            }

            $relationNameSpace = $relation::class;

            if (! isset($relation->id)) {
                return null;
            }

            $filamentResource = $this->getFilamentResourceFromModelNameSpace($relationNameSpace);

            if (! $filamentResource) {
                $component
                    ->iconColor(null)
                    ->iconPosition(null)
                    ->icon(null);

                return null;
            }

            $url = $this->getFilamentViewOrEditPage($filamentResource, $relation);

            if ($url) {

                $component
                    ->iconColor('primary')
                    ->iconPosition(IconPosition::After)
                    ->icon('heroicon-o-arrow-top-right-on-square');
            }

            return $url;
        });
    }

    private function getFilamentResourceFromModelNameSpace(string $modelNameSpace)
    {
        $resources = Filament::getResources();

        foreach ($resources as $resource) {
            if ($resource::getModel() === $modelNameSpace) {
                return $resource;
            }
        }

        return null;
    }

    private function getFilamentViewOrEditPage(string $filamentResource, Model $record): ?string
    {
        $pages = $filamentResource::getPages();

        if (isset($pages['view']) && $filamentResource::canView($record)) {
            return $filamentResource::getUrl('view', ['record' => $record->id]);
        }

        if (isset($pages['edit']) && $filamentResource::canEdit($record)) {
            return $filamentResource::getUrl('edit', ['record' => $record->id]);
        }

        return null;
    }
}
