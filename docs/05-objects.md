# Objects

- [Response Entities](#response-entities)
  - [&lt;Entity&gt;Item](#ltentitygtitem)
  - [&lt;Entity&gt;Collection](#ltentitygtcollection)
  - [Pagination](#pagination)
  - [Plan](#plan)
  - [RateLimit](#ratelimit)
  - [Subscription](#subscription)
- [Core Entities](#core-entities)
  - [City](#city)
  - [Continent](#continent)
  - [Country](#country)
  - [FilterEntity](#filterentity)
  - [Region](#region)
  - [Type](#type)
  - [TypeEntity](#typeentity)

## Response Entities

### &lt;Entity&gt;Item

- `getData()`: _&lt;Entity&gt;_ object
- `getSubscriptions()`: [`Subscription[]`](#subscription)
- `getRateLimit()`: [`RateLimit`](#ratelimit)
- `getTimezone()`: `string`

### &lt;Entity&gt;Collection

- `getData()`: Array of _&lt;Entity&gt;_ objects
- `getPagination()`: [`Pagination`](#pagination)
- `getSubscriptions()`: [`Subscription[]`](#subscription)
- `getRateLimit()`: [`RateLimit`](#ratelimit)
- `getTimezone()`: `string`

### Pagination

- `getCount()`: `int`
- `getPerPage()`: `int`
- `getCurrentPage()`: `int`
- `getNextPage()`: `?string`
- `hasMore()`: `bool`

### Plan

- `getName()`: `string`
- `getSport()`: `string`
- `getCategory()`: `string`

### RateLimit

- `getSecondsToReset()`: `int`
- `getRemainingNumRequests()`: `int`
- `getRequestedEntity()`: `string`

### Subscription

- `getMeta()`: `array`
- `getPlans()`: [`Plan[]`](#plan)
- `getAddOns()`: `array`
- `getWidgets()`: `array`

## Core Entities

### City

- `getId()`: `int`
- `getRegionId()`: `int`
- `getCountryId()`: `?int`
- `getName()`: `?string`
- `getLatitude()`: `?float`
- `getLongitude()`: `?float`
- `getRegion()`: [`?Region`](#region)

### Continent

- `getId()`: `int`
- `getName()`: `?string`
- `getCode()`: `?string`
- `getCountries()`: [`?Country[]`](#country)

### Country

- `getId()`: `int`
- `getContinentId()`: `int`
- `getName()`: `?string`
- `getOfficialName()`: `?string`
- `getFifaName()`: `?string`
- `getIso2()`: `?string`
- `getIso3()`: `?string`
- `getLatitude()`: `?float`
- `getLongitude()`: `?float`
- `getBorders()`: `?array`
- `getImagePath()`: `?string`
- `getContinent()`: [`?Continent`](#continent)
- `getRegions()`: [`?Region[]`](#region)

### FilterEntity

- `getName()`: `string`
- `getFilters()`: `array`

### Region

- `getId()`: `int`
- `getCountryId()`: `int`
- `getName()`: `?string`
- `getCountry()`: [`?Country`](#country)
- `getCities()`: [`?City[]`](#city)

### Type

- `getId()`: `int`
- `getName()`: `string`
- `getCode()`: `string`
- `getDeveloperName()`: `string`
- `getModelType()`: `string`
- `getStatGroup()`: `?string`

### TypeEntity

- `getName()`: `string`
- `getUpdatedAt()`: `\DateTimeImmutable`
- `getTypes()`: [`Type[]`](#type)