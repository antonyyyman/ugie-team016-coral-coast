<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContactForms Model
 *
 * @method \App\Model\Entity\ContactForm newEmptyEntity()
 * @method \App\Model\Entity\ContactForm newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ContactForm> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContactForm get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ContactForm findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ContactForm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ContactForm> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContactForm|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ContactForm saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ContactForm>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ContactForm>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ContactForm>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ContactForm> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ContactForm>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ContactForm>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ContactForm>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ContactForm> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContactFormsTable extends Table
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
        $this->loadModel('ContactForm');
        $this->setTable('contact_forms');
        $this->setDisplayField('email');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('phone_number')
            ->maxLength('phone_number', 15)
            ->allowEmptyString('phone_number');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 50)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->scalar('query')
            ->maxLength('query', 2000)
            ->requirePresence('query', 'create')
            ->notEmptyString('query');

        return $validator;
    }
}
