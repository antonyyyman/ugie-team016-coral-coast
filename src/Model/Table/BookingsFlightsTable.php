<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BookingsFlights Model
 *
 * @property \App\Model\Table\BookingsTable&\Cake\ORM\Association\BelongsTo $Bookings
 * @property \App\Model\Table\FlightsTable&\Cake\ORM\Association\BelongsTo $Flights
 *
 * @method \App\Model\Entity\BookingsFlight newEmptyEntity()
 * @method \App\Model\Entity\BookingsFlight newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\BookingsFlight> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BookingsFlight get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\BookingsFlight findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\BookingsFlight patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\BookingsFlight> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BookingsFlight|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\BookingsFlight saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\BookingsFlight>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BookingsFlight>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BookingsFlight>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BookingsFlight> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BookingsFlight>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BookingsFlight>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BookingsFlight>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BookingsFlight> deleteManyOrFail(iterable $entities, array $options = [])
 */
class BookingsFlightsTable extends Table
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

        $this->setTable('bookings_flights');
        $this->setDisplayField(['booking_id', 'flight_id']);
        $this->setPrimaryKey(['booking_id', 'flight_id']);

        $this->belongsTo('Bookings', [
            'foreignKey' => 'booking_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Flights', [
            'foreignKey' => 'flight_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['booking_id'], 'Bookings'), ['errorField' => 'booking_id']);
        $rules->add($rules->existsIn(['flight_id'], 'Flights'), ['errorField' => 'flight_id']);

        return $rules;
    }
}
