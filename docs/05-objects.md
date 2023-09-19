# Objects

- [Responses](#responses)
  - [&lt;Entity&gt;Item](#ltentitygtitem)
  - [&lt;Entity&gt;Collection](#ltentitygtcollection)
- [Entities](#entities)
  - [City](#city)
  - [Continent](#continent)
  - [Country](#country)
  - [Pagination](#pagination)
  - [Plan](#plan)
  - [RateLimit](#ratelimit)
  - [Region](#region)
  - [Subscription](#subscription)

## Responses

### &lt;Entity&gt;Item

- `getData()`: _Entity_ object
- `getSubscriptions()`: [`Subscription[]`](#subscription)
- `getRateLimit()`: [`RateLimit`](#ratelimit)
- `getTimezone()`: `string`

### &lt;Entity&gt;Collection

- `getData()`: Array of _Entity_ objects
- `getPagination()`: [`Pagination`](#pagination)
- `getSubscriptions()`: [`Subscription[]`](#subscription)
- `getRateLimit()`: [`RateLimit`](#ratelimit)
- `getTimezone()`: `string`

## Entities

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

### Region

- `getId()`: `int`
- `getCountryId()`: `int`
- `getName()`: `?string`
- `getCountry()`: [`?Country`](#country)
- `getCities()`: [`?City[]`](#city)

### Subscription

- `getMeta()`: `array`
- `getPlans()`: [`Plan[]`](#plan)
- `getAddOns()`: `array`
- `getWidgets()`: `array`