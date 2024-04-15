<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Flights Model
 *
 * @property \App\Model\Table\BookingsTable&\Cake\ORM\Association\HasMany $Bookings
 * @property \App\Model\Table\FlightTravelDealsTable&\Cake\ORM\Association\HasMany $FlightTravelDeals
 * @property \App\Model\Table\TravelDealsTable&\Cake\ORM\Association\HasMany $TravelDeals
 * @property \App\Model\Table\BookingsTable&\Cake\ORM\Association\BelongsToMany $Bookings
 *
 * @method \App\Model\Entity\Flight newEmptyEntity()
 * @method \App\Model\Entity\Flight newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Flight> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Flight get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Flight findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Flight patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Flight> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Flight|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Flight saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Flight>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Flight>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Flight>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Flight> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Flight>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Flight>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Flight>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Flight> deleteManyOrFail(iterable $entities, array $options = [])
 */
class FlightsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('flights');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Bookings', [
            'foreignKey' => 'flight_id',
        ]);
        $this->hasMany('FlightTravelDeals', [
            'foreignKey' => 'flight_id',
        ]);
        $this->hasMany('TravelDeals', [
            'foreignKey' => 'flight_id',
        ]);
        $this->belongsToMany('Bookings', [
            'foreignKey' => 'flight_id',
            'targetForeignKey' => 'booking_id',
            'joinTable' => 'bookings_flights',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('flight_number')
            ->maxLength('flight_number', 50)
            ->allowEmptyString('flight_number');

        $validator
            ->scalar('departure_airport')
            ->maxLength('departure_airport', 50)
            ->allowEmptyString('departure_airport');

        $validator
            ->scalar('arrival_airport')
            ->maxLength('arrival_airport', 50)
            ->allowEmptyString('arrival_airport');

        $validator
            ->date('departure_date')
            ->allowEmptyDate('departure_date');

        $validator
            ->date('arrival_date')
            ->allowEmptyDate('arrival_date');

        $validator
            ->decimal('price')
            ->allowEmptyString('price');

        return $validator;
    }
}
