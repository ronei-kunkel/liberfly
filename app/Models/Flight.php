<?php

namespace App\Models;

use App\Core\Domain\Entity\Flight\Flight as FlightEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Flight extends Model
{
    use HasFactory;

    public function map(self $self): FlightEntity
    {
        $flight = FlightEntity::new($self->id, $self->origin, $self->destiny);
        return $flight;
    }

    public $timestamps = false;

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'origin',
        'destiny',
    ];

    protected static function booted()
    {
        static::created(fn(Flight $flight) => $flight->id = (string) Uuid::uuid4());
    }

}
