import { queryParams, type RouteQueryOptions, type RouteDefinition } from './../../../../../wayfinder'
/**
* @see \App\Http\Controllers\Auth\RegisterController::index
* @see app/Http/Controllers/Auth/RegisterController.php:13
* @route '/register'
*/
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/register',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Auth\RegisterController::index
* @see app/Http/Controllers/Auth/RegisterController.php:13
* @route '/register'
*/
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Auth\RegisterController::index
* @see app/Http/Controllers/Auth/RegisterController.php:13
* @route '/register'
*/
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Auth\RegisterController::index
* @see app/Http/Controllers/Auth/RegisterController.php:13
* @route '/register'
*/
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

const RegisterController = { index }

export default RegisterController