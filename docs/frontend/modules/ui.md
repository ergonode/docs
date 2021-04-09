# UI

UI library module defining every component in Ergonode design system.


## Configuration

<br>

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/ui`   |
| Order         | `5`                     |
| Aliases       | `@UI`: `/`       |
| Relations         | [`@Core`][module-core]                     |
| Required       | true     |

## Extending

### Grid

Extending `Grid` might be divided into:

- replacing all of the `TEXT` column type and filter type in the application
- adding support for new type from external module
- extending props

#### Rendering

Rendering `Grid` is based on column types:

```javascript
    
const column = {
    ...
    type: 'SELECT',
    filter: {
        ...
        type: 'MULTI_SELECT',
    },
};

```

The `Grid` is supporting two layouts:
- Table - `GridTableLayout`
- Collection - `GridCollectionLayout`

Each of it has defined unique key (already defined in **extendedGridComponentsMixin** - only need is to pass as `:extended-components="extendedGridComponents"` to the `Grid` component):
- TABLE
- COLLECTION

```javascript
import {
    GRID_LAYOUT,
} from '@Core/defaults/grid';

const extendedComponents = {
    [GRID_LAYOUT.TABLE]: {
        ...
    },
    [GRID_LAYOUT.COLLECTION]: {
        ...
    },
}

```

##### Table layout

The table layout is supporting following components to be extended:
- **dataFilterCells** - map of filter presentation cells components:

    <img src="images/extends/grid/extend-grid-filter-data-cell.png" width="300px" alt="Extend grid filter data cell" />

    Example of use:

    ```javascript
    extendComponents: {
        '@UI/components/Grid/Layout/Table/Cells/Data/Filter': {
            MULTI_SELECT: () => import('yourDataFilterCellComponent'),
            ...
        }         
    },
    ```

    ---

- **dataEditFilterCells** - map of filter edit cells components:

    <img src="images/extends/grid/extend-grid-filter-edit-cell.png" width="300px" alt="Extend grid filter edit cell" />

    Example of use:
    
    ```javascript
    extendComponents: {
        '@UI/components/Grid/Layout/Table/Cells/Edit/Filter': {
            MULTI_SELECT: () => import('yourEditFilterCellComponent'),
            ...
        }
    },
    ```
  
    ---
  
- **dataCells** - map of data cells components:

    <img src="images/extends/grid/extend-grid-data-cell.png" width="300px" alt="Extend grid data cell" />

    Example of use:
    
    ```javascript
    extendComponents: {
        '@UI/components/Grid/Layout/Table/Cells/Data': {
            SELECT: () => import('yourDataCellComponent'),
            ...
        }
    },
    ```

    ---
  
- **dataEditCells** - map of data edit cells components:

    <img src="images/extends/grid/extend-grid-edit-data-cell.png" width="250px" alt="Extend grid edit data cell" />

    Example of use:
    
    ```javascript
    extendComponents: {
        '@UI/components/Grid/Layout/Table/Cells/Edit': {
            SELECT: () => import('yourEditDataCellComponent'),
            ...
        }
    },
    ```

    ---
  
- **columns** - map of columns components:
 
    <img src="images/extends/grid/extend-grid-column.png" width="250px" alt="Extend grid column" />

    Example of use:
    
    ```javascript
    extendComponents: {
        '@UI/components/Grid/Layout/Table/Columns': {
            SELECT: () => import('yourColumnComponent'),
            ...
        }
    },
    ```
    
    > By extending **column** for given type, all extended properties are going to be overwritten. The whole column has to be defined from scratch

    ---

##### Collection layout

The collection layout only supports **dataCells** cuz it doesn't have any column, filter or edit state.

- **dataCells** - map of data cells components:

    <img src="images/extends/grid/extend-grid-data-collection-cell.png" width="300px" alt="Extend grid collection data cell" />

    Example of use:

    ```javascript
    extendComponents: {
        '@UI/components/Grid/Layout/Collection/Cells': {
          SELECT: () => import('yourCollectionDataCellComponent'),
          ...
        }
    },
    ```

#### Overwriting props

Each `Grid` has defined `v-bind="extendedProps['grid']"` which might be added as:

The module `product-batch-actions` is extending `ProductsGrid` by `selectColumn` which will add the column with checkboxes used for row selection  

<img src="images/extends/grid/extend-grid-props.png" width="50px" alt="Extend grid props" />


Example of use:

```javascript
extendMethods: {
    '@Products/components/Grids/ProductsGrid/props': () => ({
        grid: [
            {
                key: 'is-select-column',
                value: true,
                priority: 10,
            },
        ],
    }),
},
```

It will merge every prop from each module and by priority will pass it to `Grid` - the lower priority value the higher order. 

[module-core]: frontend/modules/core
