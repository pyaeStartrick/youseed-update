<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class NewslettersExport implements FromCollection, WithHeadings, WithMapping
{
    protected $newsletters;

    public function __construct($newsletters)
    {
        $this->newsletters = $newsletters;
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        return $this->newsletters;
    }

    /**
     * @inheritDoc
     */
    public function headings(): array
    {
        return [
            trans('admin/main.id'),
            'Name',
            'Age',
            'Whatsapp Number',
            trans('admin/main.created_at'),
        ];
    }

    /**
     * @inheritDoc
     */
    public function map($newsletter): array
    {
        return [
            $newsletter->id,
            $newsletter->name,
            $newsletter->age,
            $newsletter->whatsapp,
            dateTimeFormat($newsletter->created_at, 'j M Y')
        ];
    }
}
