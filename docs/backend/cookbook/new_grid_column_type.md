# How to create a new grid column type

## Column Object

Column type object lives in `YourModule\Column\` namespace, it should extends `Ergonode\Grid\Column\AbstractColumn` class.

```php
class MultiSelectColumn extends AbstractColumn
{
    public const TYPE = 'MULTI_SELECT';

    /**
     * {@inheritDoc}
     */
    public function getType(): string
    {
        return self::TYPE;
    }
```

Name convention is `YourColumnNameColumn.php`. Each column class needs Renderer.

## Renderer Object

Renderer object lives in `YourModule\Column\Renderer` namespace.

This class should implements `Ergonode\Grid\Column\Renderer\ColumnRednererInterface`.

Two methods are obligatory:

* `supports` - thanks to this class system knows what class is rendered.
* `render` - method responsible for rendering this column in the grid. 
You can put here some logic which would be used for rendering your custom column.

** Renderer Class Example **

```php
class LabelColumnRenderer implements ColumnRendererInterface
{
    /**
     * {@inheritDoc}
     */
    public function supports(ColumnInterface $column): bool
    {
        return $column instanceof LabelColumn;
    }

    /**
     * {@inheritDoc}
     *
     * @throws UnsupportedColumnException
     */
    public function render(ColumnInterface $column, string $id, array $row): ?string
    {
        if (!$this->supports($column)) {
            throw new UnsupportedColumnException($column);
        }

        return $row[$id] ?? null;
    }
}
```
