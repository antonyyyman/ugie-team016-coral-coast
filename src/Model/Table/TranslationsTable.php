<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Translations Model
 *
 * @property \App\Model\Table\BookingsTable&\Cake\ORM\Association\HasMany $Bookings
 * @property \App\Model\Table\TravelDealsTable&\Cake\ORM\Association\HasMany $TravelDeals
 *
 * @method \App\Model\Entity\Translation newEmptyEntity()
 * @method \App\Model\Entity\Translation newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Translation> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Translation get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Translation findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Translation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Translation> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Translation|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Translation saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Translation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Translation>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Translation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Translation> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Translation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Translation>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Translation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Translation> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TranslationsTable extends Table
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

        $this->setTable('translations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Bookings', [
            'foreignKey' => 'translation_id',
        ]);
        $this->hasMany('TravelDeals', [
            'foreignKey' => 'translation_id',
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
            ->scalar('language_from')
            ->maxLength('language_from', 50)
            ->allowEmptyString('language_from');

        $validator
            ->scalar('language_to')
            ->maxLength('language_to', 50)
            ->allowEmptyString('language_to');

        $validator
            ->scalar('description')
            ->maxLength('description', 50)
            ->allowEmptyString('description');

        $validator
            ->decimal('price')
            ->allowEmptyString('price');

        return $validator;
    }
}
