import { queryParams, type RouteQueryOptions, type RouteDefinition } from './../../wayfinder'
/**
* @see routes/web.php:39
* @route '/dashboard'
*/
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/dashboard',
} satisfies RouteDefinition<["get","head"]>

/**
* @see routes/web.php:39
* @route '/dashboard'
*/
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see routes/web.php:39
* @route '/dashboard'
*/
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

/**
* @see routes/web.php:39
* @route '/dashboard'
*/
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see routes/web.php:43
* @route '/dashboard/projects'
*/
export const projects = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: projects.url(options),
    method: 'get',
})

projects.definition = {
    methods: ["get","head"],
    url: '/dashboard/projects',
} satisfies RouteDefinition<["get","head"]>

/**
* @see routes/web.php:43
* @route '/dashboard/projects'
*/
projects.url = (options?: RouteQueryOptions) => {
    return projects.definition.url + queryParams(options)
}

/**
* @see routes/web.php:43
* @route '/dashboard/projects'
*/
projects.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: projects.url(options),
    method: 'get',
})

/**
* @see routes/web.php:43
* @route '/dashboard/projects'
*/
projects.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: projects.url(options),
    method: 'head',
})

/**
* @see routes/web.php:47
* @route '/dashboard/timesheet'
*/
export const timesheet = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: timesheet.url(options),
    method: 'get',
})

timesheet.definition = {
    methods: ["get","head"],
    url: '/dashboard/timesheet',
} satisfies RouteDefinition<["get","head"]>

/**
* @see routes/web.php:47
* @route '/dashboard/timesheet'
*/
timesheet.url = (options?: RouteQueryOptions) => {
    return timesheet.definition.url + queryParams(options)
}

/**
* @see routes/web.php:47
* @route '/dashboard/timesheet'
*/
timesheet.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: timesheet.url(options),
    method: 'get',
})

/**
* @see routes/web.php:47
* @route '/dashboard/timesheet'
*/
timesheet.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: timesheet.url(options),
    method: 'head',
})

/**
* @see routes/web.php:51
* @route '/dashboard/privacy-policy'
*/
export const privacyPolicy = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: privacyPolicy.url(options),
    method: 'get',
})

privacyPolicy.definition = {
    methods: ["get","head"],
    url: '/dashboard/privacy-policy',
} satisfies RouteDefinition<["get","head"]>

/**
* @see routes/web.php:51
* @route '/dashboard/privacy-policy'
*/
privacyPolicy.url = (options?: RouteQueryOptions) => {
    return privacyPolicy.definition.url + queryParams(options)
}

/**
* @see routes/web.php:51
* @route '/dashboard/privacy-policy'
*/
privacyPolicy.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: privacyPolicy.url(options),
    method: 'get',
})

/**
* @see routes/web.php:51
* @route '/dashboard/privacy-policy'
*/
privacyPolicy.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: privacyPolicy.url(options),
    method: 'head',
})

const dashboard = {
    index: Object.assign(index, index),
    projects: Object.assign(projects, projects),
    timesheet: Object.assign(timesheet, timesheet),
    privacyPolicy: Object.assign(privacyPolicy, privacyPolicy),
}

export default dashboard