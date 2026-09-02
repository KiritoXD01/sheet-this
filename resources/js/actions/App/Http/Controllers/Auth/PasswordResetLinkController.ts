import { queryParams, type RouteQueryOptions, type RouteDefinition } from './../../../../../wayfinder'
/**
* @see \App\Http\Controllers\Auth\PasswordResetLinkController::index
* @see app/Http/Controllers/Auth/PasswordResetLinkController.php:16
* @route '/forgot-password'
*/
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/forgot-password',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Auth\PasswordResetLinkController::index
* @see app/Http/Controllers/Auth/PasswordResetLinkController.php:16
* @route '/forgot-password'
*/
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Auth\PasswordResetLinkController::index
* @see app/Http/Controllers/Auth/PasswordResetLinkController.php:16
* @route '/forgot-password'
*/
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Auth\PasswordResetLinkController::index
* @see app/Http/Controllers/Auth/PasswordResetLinkController.php:16
* @route '/forgot-password'
*/
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Auth\PasswordResetLinkController::store
* @see app/Http/Controllers/Auth/PasswordResetLinkController.php:21
* @route '/forgot-password'
*/
export const store = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/forgot-password',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Auth\PasswordResetLinkController::store
* @see app/Http/Controllers/Auth/PasswordResetLinkController.php:21
* @route '/forgot-password'
*/
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Auth\PasswordResetLinkController::store
* @see app/Http/Controllers/Auth/PasswordResetLinkController.php:21
* @route '/forgot-password'
*/
store.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

const PasswordResetLinkController = { index, store }

export default PasswordResetLinkController