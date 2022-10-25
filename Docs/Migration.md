# Responder Migration

## Migration Structure

Migrations have two methods: create and delete. Create is the method that will be executed to create new tables, while the delete method will do the opposite thing.
An example of an empty migration would look like this:

```php
return new class extends Migration
{
    /**
     * Creates the table.
     *
     * @return void
     */
    public function create(): void
    {
        DataBase::name('table_name')->create(
            function (Blueprint $table) {
                // Fields
            }
        );
    }

    /**
     * Deletes the table.
     *
     * @return void
     */
    public function delete(): void
    {
        DataBase::name('table_name')->drop();
    }
};
```

### Setting The Migration Connection

If the migration will be interacting with a different connection you should create a new class that extends from `Migration` and set the `$connection` property.

```php
class MigrationExample extends Migration
{
    /**
     * The database connection.
     *
     * @var string
     */
    protected $connection = 'example';
}

return new class extends MigrationExample
{
    /**
     * Creates the table.
     *
     * @return void
     */
    public function create(): void
    {
        DataBase::name('table_name')->create(
            function (Blueprint $table) {
                // Fields
            }
        );
    }

    /**
     * Deletes the table.
     *
     * @return void
     */
    public function delete(): void
    {
        DataBase::name('table_name')->drop();
    }
};
```

```php
return new class extends Migration
{
    /**
     * Creates the table.
     *
     * @return void
     */
    public function create(): void
    {
        DataBase::connection('connection_name')->create('table_name',
            function (Blueprint $table) {
                // Fields
            }
        );
    }

    /**
     * Deletes the table.
     *
     * @return void
     */
    public function delete(): void
    {
        DataBase::connection('connection_name')->dropIfExists('table_name');
    }
};
```

## Running Migrations

To run all migrations, execute the `migrate` command:

```bash
$ composer migrate
```

If you want to have a visual indication of the progress of the migration execute the `migrate --verbose` command:

```bash
$ composer migrate --verbose
```

If you want to

## Example

```php
class TableName extends Migration
{
    public function create(): void
    {
        DataBase::connection('connection_name')->create('table_name',
            function (Blueprint $table) {
                // Data types
                $table->id('id');
                $table->uuid('uuid');
                $table->string('string');
                $table->integer('integer');
                $table->float('float');
                $table->boolean('boolean');
                $table->unixTime('unixTime');
                $table->enum(['value1', 'value2']);

                // Options
                $table->string('string')->primary();
                $table->string('string')->autoIncrement();
                $table->string('string')->unique();
                $table->string('string')->nullable();
                $table->string('string')->defaultValue();
                $table->string('string')->onDeleteCascade();
                $table->string('string')->onUpdateCascade();

                // Relations
                $table->foreignId('id')->constrained('table_name');
                $table->foreignUuid('id')->constrained('table_name');
            }
        );
    }

    public function delete(): void
    {
        DataBase::connection('connection_name')->dropIfExists('table_name');
    }
};

```
