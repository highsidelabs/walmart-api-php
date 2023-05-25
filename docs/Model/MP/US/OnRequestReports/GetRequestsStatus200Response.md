# #US\MP\GetRequestsStatus200Response

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**page** | **int** | Current page | [optional]
**totalCount** | **int** | Number of records fetched. | [optional]
**limit** | **int** | Number of records to be returned. Default is 10. | [optional]
**nextCursor** | **string** | Used for pagination when more than specified limit (or default 10) records are found. Use this param for next API call. Just have to use this value as query param. Need to pass only the cursor value and not the initial API call query params. For e.g. if ['nextCursor'='reportType=ITEM&requestStatus=ERROR&requestSubmissionStartDate=2021-08-20T10:52:59Z&requestSubmissionEndDate=2021-09-14T10:52:59Z&page=2&limit=1'] then subsequent call to will be [marketplace.walmartapis.com/v3/reports/reportRequests?reportType=ITEM&requestStatus=ERROR&requestSubmissionStartDate=2021-08-20T10:52:59Z&requestSubmissionEndDate=2021-09-14T10:52:59Z&page=2&limit=1]. Just have to use nextCursor value instead of query params | [optional]
**requests** | [**\Walmart\Model\MP\US\OnRequestReports\GetRequestsStatus200ResponseRequestsInner[]**](GetRequestsStatus200ResponseRequestsInner.md) | List of requests | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/MP) [[Back to README]](../../README.md)
