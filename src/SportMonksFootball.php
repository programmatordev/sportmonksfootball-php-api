<?php

namespace ProgrammatorDev\SportMonksFootball;

use Http\Message\Authentication\QueryParam;
use ProgrammatorDev\Api\Api;
use ProgrammatorDev\Api\Event\PostRequestEvent;
use ProgrammatorDev\Api\Event\PreRequestEvent;
use ProgrammatorDev\Api\Event\ResponseContentsEvent;
use ProgrammatorDev\SportMonksFootball\Entity\Response\Error;
use ProgrammatorDev\SportMonksFootball\Exception\BadRequestException;
use ProgrammatorDev\SportMonksFootball\Exception\FilterNotApplicableException;
use ProgrammatorDev\SportMonksFootball\Exception\ForbiddenException;
use ProgrammatorDev\SportMonksFootball\Exception\IncludeDepthException;
use ProgrammatorDev\SportMonksFootball\Exception\IncludeNotAllowedException;
use ProgrammatorDev\SportMonksFootball\Exception\IncludeNotAvailableException;
use ProgrammatorDev\SportMonksFootball\Exception\IncludeNotFoundException;
use ProgrammatorDev\SportMonksFootball\Exception\InsufficientIncludesException;
use ProgrammatorDev\SportMonksFootball\Exception\InsufficientResourcesException;
use ProgrammatorDev\SportMonksFootball\Exception\InvalidQueryParameterException;
use ProgrammatorDev\SportMonksFootball\Exception\NoResultsFoundException;
use ProgrammatorDev\SportMonksFootball\Exception\NotFoundException;
use ProgrammatorDev\SportMonksFootball\Exception\PaginationLimitException;
use ProgrammatorDev\SportMonksFootball\Exception\QueryComplexityException;
use ProgrammatorDev\SportMonksFootball\Exception\RateLimitException;
use ProgrammatorDev\SportMonksFootball\Exception\TooManyRequestsException;
use ProgrammatorDev\SportMonksFootball\Exception\UnauthorizedException;
use ProgrammatorDev\SportMonksFootball\Exception\UnexpectedErrorException;
use ProgrammatorDev\SportMonksFootball\Language\Language;
use ProgrammatorDev\SportMonksFootball\Resource\BookmakerResource;
use ProgrammatorDev\SportMonksFootball\Resource\CityResource;
use ProgrammatorDev\SportMonksFootball\Resource\CoachResource;
use ProgrammatorDev\SportMonksFootball\Resource\CommentaryResource;
use ProgrammatorDev\SportMonksFootball\Resource\ContinentResource;
use ProgrammatorDev\SportMonksFootball\Resource\CountryResource;
use ProgrammatorDev\SportMonksFootball\Resource\FilterResource;
use ProgrammatorDev\SportMonksFootball\Resource\FixtureResource;
use ProgrammatorDev\SportMonksFootball\Resource\LeagueResource;
use ProgrammatorDev\SportMonksFootball\Resource\LivescoreResource;
use ProgrammatorDev\SportMonksFootball\Resource\MarketResource;
use ProgrammatorDev\SportMonksFootball\Resource\PlayerResource;
use ProgrammatorDev\SportMonksFootball\Resource\PreMatchOddResource;
use ProgrammatorDev\SportMonksFootball\Resource\RefereeResource;
use ProgrammatorDev\SportMonksFootball\Resource\RegionResource;
use ProgrammatorDev\SportMonksFootball\Resource\RivalResource;
use ProgrammatorDev\SportMonksFootball\Resource\RoundResource;
use ProgrammatorDev\SportMonksFootball\Resource\ScheduleResource;
use ProgrammatorDev\SportMonksFootball\Resource\SeasonResource;
use ProgrammatorDev\SportMonksFootball\Resource\StageResource;
use ProgrammatorDev\SportMonksFootball\Resource\StandingResource;
use ProgrammatorDev\SportMonksFootball\Resource\StateResource;
use ProgrammatorDev\SportMonksFootball\Resource\StatisticResource;
use ProgrammatorDev\SportMonksFootball\Resource\TeamResource;
use ProgrammatorDev\SportMonksFootball\Resource\TeamSquadResource;
use ProgrammatorDev\SportMonksFootball\Resource\TimezoneResource;
use ProgrammatorDev\SportMonksFootball\Resource\TopscorerResource;
use ProgrammatorDev\SportMonksFootball\Resource\TransferResource;
use ProgrammatorDev\SportMonksFootball\Resource\TvStationResource;
use ProgrammatorDev\SportMonksFootball\Resource\TypeResource;
use ProgrammatorDev\SportMonksFootball\Resource\VenueResource;

class SportMonksFootball extends Api
{
    private array $options;

    public function __construct(
        #[\SensitiveParameter] private string $apiKey,
        array $options = []
    )
    {
        parent::__construct();

        $this->options = $this->configureOptions($options);
        $this->configureApi();
    }

    public function bookmakers(): BookmakerResource
    {
        return new BookmakerResource($this);
    }

    public function cities(): CityResource
    {
        return new CityResource($this);
    }

    public function coaches(): CoachResource
    {
        return new CoachResource($this);
    }

    public function commentaries(): CommentaryResource
    {
        return new CommentaryResource($this);
    }

    public function continents(): ContinentResource
    {
        return new ContinentResource($this);
    }

    public function countries(): CountryResource
    {
        return new CountryResource($this);
    }

    public function filters(): FilterResource
    {
        return new FilterResource($this);
    }

    public function fixtures(): FixtureResource
    {
        return new FixtureResource($this);
    }

    public function leagues(): LeagueResource
    {
        return new LeagueResource($this);
    }

    public function livescores(): LivescoreResource
    {
        return new LivescoreResource($this);
    }

    public function markets(): MarketResource
    {
        return new MarketResource($this);
    }

    public function players(): PlayerResource
    {
        return new PlayerResource($this);
    }

    public function preMatchOdds(): PreMatchOddResource
    {
        return new PreMatchOddResource($this);
    }

    public function referees(): RefereeResource
    {
        return new RefereeResource($this);
    }

    public function regions(): RegionResource
    {
        return new RegionResource($this);
    }

    public function rivals(): RivalResource
    {
        return new RivalResource($this);
    }

    public function rounds(): RoundResource
    {
        return new RoundResource($this);
    }

    public function schedules(): ScheduleResource
    {
        return new ScheduleResource($this);
    }

    public function seasons(): SeasonResource
    {
        return new SeasonResource($this);
    }

    public function stages(): StageResource
    {
        return new StageResource($this);
    }

    public function standings(): StandingResource
    {
        return new StandingResource($this);
    }

    public function states(): StateResource
    {
        return new StateResource($this);
    }

    public function statistics(): StatisticResource
    {
        return new StatisticResource($this);
    }

    public function teams(): TeamResource
    {
        return new TeamResource($this);
    }

    public function teamSquads(): TeamSquadResource
    {
        return new TeamSquadResource($this);
    }

    public function timezones(): TimezoneResource
    {
        return new TimezoneResource($this);
    }

    public function topscorers(): TopscorerResource
    {
        return new TopscorerResource($this);
    }

    public function transfers(): TransferResource
    {
        return new TransferResource($this);
    }

    public function tvStations(): TvStationResource
    {
        return new TvStationResource($this);
    }

    public function types(): TypeResource
    {
        return new TypeResource($this);
    }

    public function venues(): VenueResource
    {
        return new VenueResource($this);
    }

    private function configureOptions(array $options): array
    {
        $this->optionsResolver->setDefault('timezone', 'UTC');
        $this->optionsResolver->setDefault('language', Language::ENGLISH);

        $this->optionsResolver->setAllowedTypes('timezone', 'string');
        $this->optionsResolver->setAllowedTypes('language', 'string');

        $this->optionsResolver->setAllowedValues('timezone', \DateTimeZone::listIdentifiers());

        return $this->optionsResolver->resolve($options);
    }

    private function configureApi(): void
    {
        $this->setBaseUrl('https://api.sportmonks.com');

        $this->setAuthentication(new QueryParam(['api_token' => $this->apiKey]));

        $this->addQueryDefault('timezone', $this->options['timezone']);
        $this->addQueryDefault('locale', $this->options['language']);

        $this->addPreRequestListener(function (PreRequestEvent $event) {
            $request = $event->getRequest();
            $uri = $request->getUri();

            \parse_str($uri->getQuery(), $query);

            // removes "per_page" query parameter if "populate" filter exists,
            // otherwise it would be ignored
            if (!empty($query['filters']) && $query['filters'] === 'populate') {
                if (!empty($query['per_page'])) {
                    unset($query['per_page']);

                    $uri = $uri->withQuery(\http_build_query($query));
                    $request = $request->withUri($uri);

                    $event->setRequest($request);
                }
            }
        });

        $this->addPostRequestListener(function(PostRequestEvent $event) {
            $response = $event->getResponse();
            $statusCode = $response->getStatusCode();

            $data = \json_decode($response->getBody()->getContents(), true);

            // since body is a stream, it must be rewound for later calls (ResponseContentsEvent)
            // otherwise contents would be empty
            $response->getBody()->rewind();

            // if response contains a message it is an error
            $errorMessage = $data['message'] ?? null;

            // an error may occur with a misleading 200 status code:
            // if there is a "message" property on the response, it means it is returning an error
            if ($statusCode >= 200 && $statusCode <= 299 && $errorMessage !== null) {
                throw new NoResultsFoundException(new Error($data));
            }

            if ($statusCode >= 400) {
                $errorCode = $data['code'] ?? null;
                $errorLink = $data['link'] ?? null;

                // filter error by the provided "code" property (ignores status codes as they may be misleading)
                // https://docs.sportmonks.com/football/api/error-codes/include-exceptions
                // https://docs.sportmonks.com/football/api/error-codes/filtering-and-complexity-exceptions
                // https://docs.sportmonks.com/football/api/error-codes/other-exceptions
                if ($errorCode !== null) {
                    match ($errorCode) {
                        5000 => throw new IncludeNotAllowedException($errorMessage, $errorCode, $errorLink),
                        5001 => throw new IncludeNotFoundException($errorMessage, $errorCode, $errorLink),
                        5002 => throw new InsufficientIncludesException($errorMessage, $errorCode, $errorLink),
                        5003 => throw new PaginationLimitException($errorMessage, $errorCode, $errorLink),
                        5004 => throw new QueryComplexityException($errorMessage, $errorCode, $errorLink),
                        5005 => throw new RateLimitException($errorMessage, $errorCode, $errorLink),
                        5006 => throw new InvalidQueryParameterException($errorMessage, $errorCode, $errorLink),
                        5007 => throw new InsufficientResourcesException($errorMessage, $errorCode, $errorLink),
                        5008 => throw new IncludeDepthException($errorMessage, $errorCode, $errorLink),
                        5010 => throw new FilterNotApplicableException($errorMessage, $errorCode, $errorLink),
                        5013 => throw new IncludeNotAvailableException($errorMessage, $errorCode, $errorLink),
                        default => throw new UnexpectedErrorException($errorMessage, $errorCode, $errorLink)
                    };
                }

                // filter error by status code
                // https://docs.sportmonks.com/football/api/error-codes
                match ($statusCode) {
                    400 => throw new BadRequestException($errorMessage, $statusCode, $errorLink),
                    401 => throw new UnauthorizedException($errorMessage, $statusCode, $errorLink),
                    403 => throw new ForbiddenException($errorMessage, $statusCode, $errorLink),
                    404 => throw new NotFoundException($errorMessage, $statusCode, $errorLink),
                    429 => throw new TooManyRequestsException($errorMessage, $statusCode, $errorLink),
                    default => throw new UnexpectedErrorException($errorMessage, $statusCode, $errorLink)
                };
            }
        });

        $this->addResponseContentsListener(function(ResponseContentsEvent $event) {
            // decode json string response into an array
            $contents = $event->getContents();
            $contents = \json_decode($contents, true);

            $event->setContents($contents);
        });
    }
}