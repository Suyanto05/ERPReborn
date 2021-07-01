<?php
// This file was auto-generated from sdk-root/src/data/redshift-data/2019-12-20/docs-2.json
return [ 'version' => '2.0', 'service' => '<p>You can use the Amazon Redshift Data API to run queries on Amazon Redshift tables. You can run individual SQL statements, which are committed if the statement succeeds. </p> <p>For more information about the Amazon Redshift Data API, see <a href="https://docs.aws.amazon.com/redshift/latest/mgmt/data-api.html">Using the Amazon Redshift Data API</a> in the <i>Amazon Redshift Cluster Management Guide</i>. </p>', 'operations' => [ 'CancelStatement' => '<p>Cancels a running query. To be canceled, a query must be running. </p>', 'DescribeStatement' => '<p>Describes the details about a specific instance when a query was run by the Amazon Redshift Data API. The information includes when the query started, when it finished, the query status, the number of rows returned, and the SQL statement. </p>', 'DescribeTable' => '<p>Describes the detailed information about a table from metadata in the cluster. The information includes its columns. A token is returned to page through the column list. Depending on the authorization method, use one of the following combinations of request parameters: </p> <ul> <li> <p>AWS Secrets Manager - specify the Amazon Resource Name (ARN) of the secret and the cluster identifier that matches the cluster in the secret. </p> </li> <li> <p>Temporary credentials - specify the cluster identifier, the database name, and the database user name. Permission to call the <code>redshift:GetClusterCredentials</code> operation is required to use this method. </p> </li> </ul>', 'ExecuteStatement' => '<p>Runs an SQL statement, which can be data manipulation language (DML) or data definition language (DDL). This statement must be a single SQL statement. Depending on the authorization method, use one of the following combinations of request parameters: </p> <ul> <li> <p>AWS Secrets Manager - specify the Amazon Resource Name (ARN) of the secret and the cluster identifier that matches the cluster in the secret. </p> </li> <li> <p>Temporary credentials - specify the cluster identifier, the database name, and the database user name. Permission to call the <code>redshift:GetClusterCredentials</code> operation is required to use this method. </p> </li> </ul>', 'GetStatementResult' => '<p>Fetches the temporarily cached result of an SQL statement. A token is returned to page through the statement results. </p>', 'ListDatabases' => '<p>List the databases in a cluster. A token is returned to page through the database list. Depending on the authorization method, use one of the following combinations of request parameters: </p> <ul> <li> <p>AWS Secrets Manager - specify the Amazon Resource Name (ARN) of the secret and the cluster identifier that matches the cluster in the secret. </p> </li> <li> <p>Temporary credentials - specify the cluster identifier, the database name, and the database user name. Permission to call the <code>redshift:GetClusterCredentials</code> operation is required to use this method. </p> </li> </ul>', 'ListSchemas' => '<p>Lists the schemas in a database. A token is returned to page through the schema list. Depending on the authorization method, use one of the following combinations of request parameters: </p> <ul> <li> <p>AWS Secrets Manager - specify the Amazon Resource Name (ARN) of the secret and the cluster identifier that matches the cluster in the secret. </p> </li> <li> <p>Temporary credentials - specify the cluster identifier, the database name, and the database user name. Permission to call the <code>redshift:GetClusterCredentials</code> operation is required to use this method. </p> </li> </ul>', 'ListStatements' => '<p>List of SQL statements. By default, only finished statements are shown. A token is returned to page through the statement list. </p>', 'ListTables' => '<p>List the tables in a database. If neither <code>SchemaPattern</code> nor <code>TablePattern</code> are specified, then all tables in the database are returned. A token is returned to page through the table list. Depending on the authorization method, use one of the following combinations of request parameters: </p> <ul> <li> <p>AWS Secrets Manager - specify the Amazon Resource Name (ARN) of the secret and the cluster identifier that matches the cluster in the secret. </p> </li> <li> <p>Temporary credentials - specify the cluster identifier, the database name, and the database user name. Permission to call the <code>redshift:GetClusterCredentials</code> operation is required to use this method. </p> </li> </ul>', ], 'shapes' => [ 'ActiveStatementsExceededException' => [ 'base' => '<p>The number of active statements exceeds the limit.</p>', 'refs' => [], ], 'Blob' => [ 'base' => NULL, 'refs' => [ 'Field$blobValue' => '<p>A value of the BLOB data type. </p>', ], ], 'Boolean' => [ 'base' => NULL, 'refs' => [ 'CancelStatementResponse$Status' => '<p>A value that indicates whether the cancel statement succeeded (true). </p>', 'DescribeStatementResponse$HasResultSet' => '<p>A value that indicates whether the statement has a result set. The result set can be empty. </p>', 'ExecuteStatementInput$WithEvent' => '<p>A value that indicates whether to send an event to the Amazon EventBridge event bus after the SQL statement runs. </p>', 'ListStatementsRequest$RoleLevel' => '<p>A value that filters which statements to return in the response. If true, all statements run by the caller\'s IAM role are returned. If false, only statements run by the caller\'s IAM role in the current IAM session are returned. The default is true. </p>', ], ], 'BoxedBoolean' => [ 'base' => NULL, 'refs' => [ 'Field$booleanValue' => '<p>A value of the Boolean data type. </p>', 'Field$isNull' => '<p>A value that indicates whether the data is NULL. </p>', ], ], 'BoxedDouble' => [ 'base' => NULL, 'refs' => [ 'Field$doubleValue' => '<p>A value of the double data type. </p>', ], ], 'BoxedLong' => [ 'base' => NULL, 'refs' => [ 'Field$longValue' => '<p>A value of the long data type. </p>', ], ], 'CancelStatementRequest' => [ 'base' => NULL, 'refs' => [], ], 'CancelStatementResponse' => [ 'base' => NULL, 'refs' => [], ], 'ColumnList' => [ 'base' => NULL, 'refs' => [ 'DescribeTableResponse$ColumnList' => '<p>A list of columns in the table. </p>', ], ], 'ColumnMetadata' => [ 'base' => '<p>The properties (metadata) of a column. </p>', 'refs' => [ 'ColumnList$member' => NULL, 'ColumnMetadataList$member' => NULL, ], ], 'ColumnMetadataList' => [ 'base' => NULL, 'refs' => [ 'GetStatementResultResponse$ColumnMetadata' => '<p>The properties (metadata) of a column. </p>', ], ], 'DatabaseList' => [ 'base' => NULL, 'refs' => [ 'ListDatabasesResponse$Databases' => '<p>The names of databases. </p>', ], ], 'DescribeStatementRequest' => [ 'base' => NULL, 'refs' => [], ], 'DescribeStatementResponse' => [ 'base' => NULL, 'refs' => [], ], 'DescribeTableRequest' => [ 'base' => NULL, 'refs' => [], ], 'DescribeTableResponse' => [ 'base' => NULL, 'refs' => [], ], 'ExecuteStatementException' => [ 'base' => '<p>The SQL statement encountered an environmental error while running.</p>', 'refs' => [], ], 'ExecuteStatementInput' => [ 'base' => NULL, 'refs' => [], ], 'ExecuteStatementOutput' => [ 'base' => NULL, 'refs' => [], ], 'Field' => [ 'base' => '<p>A data value in a column. </p>', 'refs' => [ 'FieldList$member' => NULL, ], ], 'FieldList' => [ 'base' => NULL, 'refs' => [ 'SqlRecords$member' => NULL, ], ], 'GetStatementResultRequest' => [ 'base' => NULL, 'refs' => [], ], 'GetStatementResultResponse' => [ 'base' => NULL, 'refs' => [], ], 'Integer' => [ 'base' => NULL, 'refs' => [ 'ColumnMetadata$length' => '<p>The length of the column.</p>', 'ColumnMetadata$nullable' => '<p>A value that indicates whether the column is nullable. </p>', 'ColumnMetadata$precision' => '<p>The precision value of a decimal number column. </p>', 'ColumnMetadata$scale' => '<p>The scale value of a decimal number column. </p>', ], ], 'InternalServerException' => [ 'base' => '<p>The Amazon Redshift Data API operation failed due to invalid input. </p>', 'refs' => [], ], 'ListDatabasesRequest' => [ 'base' => NULL, 'refs' => [], ], 'ListDatabasesResponse' => [ 'base' => NULL, 'refs' => [], ], 'ListSchemasRequest' => [ 'base' => NULL, 'refs' => [], ], 'ListSchemasResponse' => [ 'base' => NULL, 'refs' => [], ], 'ListStatementsLimit' => [ 'base' => NULL, 'refs' => [ 'ListStatementsRequest$MaxResults' => '<p>The maximum number of SQL statements to return in the response. If more SQL statements exist than fit in one response, then <code>NextToken</code> is returned to page through the results. </p>', ], ], 'ListStatementsRequest' => [ 'base' => NULL, 'refs' => [], ], 'ListStatementsResponse' => [ 'base' => NULL, 'refs' => [], ], 'ListTablesRequest' => [ 'base' => NULL, 'refs' => [], ], 'ListTablesResponse' => [ 'base' => NULL, 'refs' => [], ], 'Location' => [ 'base' => NULL, 'refs' => [ 'DescribeTableRequest$ClusterIdentifier' => '<p>The cluster identifier. This parameter is required when authenticating using either AWS Secrets Manager or temporary credentials. </p>', 'ExecuteStatementInput$ClusterIdentifier' => '<p>The cluster identifier. This parameter is required when authenticating using either AWS Secrets Manager or temporary credentials. </p>', 'ExecuteStatementOutput$ClusterIdentifier' => '<p>The cluster identifier. </p>', 'ListDatabasesRequest$ClusterIdentifier' => '<p>The cluster identifier. This parameter is required when authenticating using either AWS Secrets Manager or temporary credentials. </p>', 'ListSchemasRequest$ClusterIdentifier' => '<p>The cluster identifier. This parameter is required when authenticating using either AWS Secrets Manager or temporary credentials. </p>', 'ListTablesRequest$ClusterIdentifier' => '<p>The cluster identifier. This parameter is required when authenticating using either AWS Secrets Manager or temporary credentials. </p>', ], ], 'Long' => [ 'base' => NULL, 'refs' => [ 'DescribeStatementResponse$Duration' => '<p>The amount of time in nanoseconds that the statement ran. </p>', 'DescribeStatementResponse$RedshiftPid' => '<p>The process identifier from Amazon Redshift. </p>', 'DescribeStatementResponse$RedshiftQueryId' => '<p>The identifier of the query generated by Amazon Redshift. These identifiers are also available in the <code>query</code> column of the <code>STL_QUERY</code> system view. </p>', 'DescribeStatementResponse$ResultRows' => '<p>Either the number of rows returned from the SQL statement or the number of rows affected. If result size is greater than zero, the result rows can be the number of rows affected by SQL statements such as INSERT, UPDATE, DELETE, COPY, and others. </p>', 'DescribeStatementResponse$ResultSize' => '<p>The size in bytes of the returned results. </p>', 'GetStatementResultResponse$TotalNumRows' => '<p>The total number of rows in the result set returned from a query. You can use this number to estimate the number of calls to the <code>GetStatementResult</code> operation needed to page through the results. </p>', ], ], 'PageSize' => [ 'base' => NULL, 'refs' => [ 'DescribeTableRequest$MaxResults' => '<p>The maximum number of tables to return in the response. If more tables exist than fit in one response, then <code>NextToken</code> is returned to page through the results. </p>', 'ListDatabasesRequest$MaxResults' => '<p>The maximum number of databases to return in the response. If more databases exist than fit in one response, then <code>NextToken</code> is returned to page through the results. </p>', 'ListSchemasRequest$MaxResults' => '<p>The maximum number of schemas to return in the response. If more schemas exist than fit in one response, then <code>NextToken</code> is returned to page through the results. </p>', 'ListTablesRequest$MaxResults' => '<p>The maximum number of tables to return in the response. If more tables exist than fit in one response, then <code>NextToken</code> is returned to page through the results. </p>', ], ], 'ParameterName' => [ 'base' => NULL, 'refs' => [ 'SqlParameter$name' => '<p>The name of the parameter.</p>', ], ], 'ParameterValue' => [ 'base' => NULL, 'refs' => [ 'SqlParameter$value' => '<p>The value of the parameter. Amazon Redshift implicitly converts to the proper data type. For more inforation, see <a href="https://docs.aws.amazon.com/redshift/latest/dg/c_Supported_data_types.html">Data types</a> in the <i>Amazon Redshift Database Developer Guide</i>. </p>', ], ], 'ResourceNotFoundException' => [ 'base' => '<p>The Amazon Redshift Data API operation failed due to a missing resource. </p>', 'refs' => [], ], 'SchemaList' => [ 'base' => NULL, 'refs' => [ 'ListSchemasResponse$Schemas' => '<p>The schemas that match the request pattern. </p>', ], ], 'SecretArn' => [ 'base' => NULL, 'refs' => [ 'DescribeStatementResponse$SecretArn' => '<p>The name or Amazon Resource Name (ARN) of the secret that enables access to the database. </p>', 'DescribeTableRequest$SecretArn' => '<p>The name or ARN of the secret that enables access to the database. This parameter is required when authenticating using AWS Secrets Manager. </p>', 'ExecuteStatementInput$SecretArn' => '<p>The name or ARN of the secret that enables access to the database. This parameter is required when authenticating using AWS Secrets Manager. </p>', 'ExecuteStatementOutput$SecretArn' => '<p>The name or ARN of the secret that enables access to the database. </p>', 'ListDatabasesRequest$SecretArn' => '<p>The name or ARN of the secret that enables access to the database. This parameter is required when authenticating using AWS Secrets Manager. </p>', 'ListSchemasRequest$SecretArn' => '<p>The name or ARN of the secret that enables access to the database. This parameter is required when authenticating using AWS Secrets Manager. </p>', 'ListTablesRequest$SecretArn' => '<p>The name or ARN of the secret that enables access to the database. This parameter is required when authenticating using AWS Secrets Manager. </p>', 'StatementData$SecretArn' => '<p>The name or Amazon Resource Name (ARN) of the secret that enables access to the database. </p>', ], ], 'SqlParameter' => [ 'base' => '<p>A parameter used in a SQL statement.</p>', 'refs' => [ 'SqlParametersList$member' => NULL, ], ], 'SqlParametersList' => [ 'base' => NULL, 'refs' => [ 'DescribeStatementResponse$QueryParameters' => '<p>The parameters for the SQL statement.</p>', 'ExecuteStatementInput$Parameters' => '<p>The parameters for the SQL statement.</p>', 'StatementData$QueryParameters' => '<p>The parameters used in a SQL statement.</p>', ], ], 'SqlRecords' => [ 'base' => NULL, 'refs' => [ 'GetStatementResultResponse$Records' => '<p>The results of the SQL statement.</p>', ], ], 'StatementData' => [ 'base' => '<p>The SQL statement to run.</p>', 'refs' => [ 'StatementList$member' => NULL, ], ], 'StatementList' => [ 'base' => NULL, 'refs' => [ 'ListStatementsResponse$Statements' => '<p>The SQL statements. </p>', ], ], 'StatementNameString' => [ 'base' => NULL, 'refs' => [ 'ExecuteStatementInput$StatementName' => '<p>The name of the SQL statement. You can name the SQL statement when you create it to identify the query. </p>', 'ListStatementsRequest$StatementName' => '<p>The name of the SQL statement specified as input to <code>ExecuteStatement</code> to identify the query. You can list multiple statements by providing a prefix that matches the beginning of the statement name. For example, to list myStatement1, myStatement2, myStatement3, and so on, then provide the a value of <code>myStatement</code>. Data API does a case-sensitive match of SQL statement names to the prefix value you provide. </p>', 'StatementData$StatementName' => '<p>The name of the SQL statement. </p>', ], ], 'StatementString' => [ 'base' => NULL, 'refs' => [ 'DescribeStatementResponse$QueryString' => '<p>The SQL statement text. </p>', 'ExecuteStatementInput$Sql' => '<p>The SQL statement text to run. </p>', 'StatementData$QueryString' => '<p>The SQL statement.</p>', ], ], 'StatusString' => [ 'base' => NULL, 'refs' => [ 'DescribeStatementResponse$Status' => '<p>The status of the SQL statement being described. Status values are defined as follows: </p> <ul> <li> <p>ABORTED - The query run was stopped by the user. </p> </li> <li> <p>ALL - A status value that includes all query statuses. This value can be used to filter results. </p> </li> <li> <p>FAILED - The query run failed. </p> </li> <li> <p>FINISHED - The query has finished running. </p> </li> <li> <p>PICKED - The query has been chosen to be run. </p> </li> <li> <p>STARTED - The query run has started. </p> </li> <li> <p>SUBMITTED - The query was submitted, but not yet processed. </p> </li> </ul>', 'ListStatementsRequest$Status' => '<p>The status of the SQL statement to list. Status values are defined as follows: </p> <ul> <li> <p>ABORTED - The query run was stopped by the user. </p> </li> <li> <p>ALL - A status value that includes all query statuses. This value can be used to filter results. </p> </li> <li> <p>FAILED - The query run failed. </p> </li> <li> <p>FINISHED - The query has finished running. </p> </li> <li> <p>PICKED - The query has been chosen to be run. </p> </li> <li> <p>STARTED - The query run has started. </p> </li> <li> <p>SUBMITTED - The query was submitted, but not yet processed. </p> </li> </ul>', 'StatementData$Status' => '<p>The status of the SQL statement. An example is the that the SQL statement finished. </p>', ], ], 'String' => [ 'base' => NULL, 'refs' => [ 'ActiveStatementsExceededException$Message' => NULL, 'ColumnMetadata$columnDefault' => '<p>The default value of the column. </p>', 'ColumnMetadata$label' => '<p>The label for the column. </p>', 'ColumnMetadata$name' => '<p>The name of the column. </p>', 'ColumnMetadata$schemaName' => '<p>The name of the schema that contains the table that includes the column.</p>', 'ColumnMetadata$tableName' => '<p>The name of the table that includes the column. </p>', 'ColumnMetadata$typeName' => '<p>The database-specific data type of the column. </p>', 'DatabaseList$member' => NULL, 'DescribeStatementResponse$ClusterIdentifier' => '<p>The cluster identifier. </p>', 'DescribeStatementResponse$Database' => '<p>The name of the database. </p>', 'DescribeStatementResponse$DbUser' => '<p>The database user name. </p>', 'DescribeStatementResponse$Error' => '<p>The error message from the cluster if the SQL statement encountered an error while running. </p>', 'DescribeTableRequest$ConnectedDatabase' => '<p>A database name. The connected database is specified when you connect with your authentication credentials. </p>', 'DescribeTableRequest$Database' => '<p>The name of the database that contains the tables to be described. If <code>ConnectedDatabase</code> is not specified, this is also the database to connect to with your authentication credentials.</p>', 'DescribeTableRequest$DbUser' => '<p>The database user name. This parameter is required when authenticating using temporary credentials. </p>', 'DescribeTableRequest$NextToken' => '<p>A value that indicates the starting point for the next set of response records in a subsequent request. If a value is returned in a response, you can retrieve the next set of records by providing this returned NextToken value in the next NextToken parameter and retrying the command. If the NextToken field is empty, all response records have been retrieved for the request. </p>', 'DescribeTableRequest$Schema' => '<p>The schema that contains the table. If no schema is specified, then matching tables for all schemas are returned. </p>', 'DescribeTableRequest$Table' => '<p>The table name. If no table is specified, then all tables for all matching schemas are returned. If no table and no schema is specified, then all tables for all schemas in the database are returned</p>', 'DescribeTableResponse$NextToken' => '<p>A value that indicates the starting point for the next set of response records in a subsequent request. If a value is returned in a response, you can retrieve the next set of records by providing this returned NextToken value in the next NextToken parameter and retrying the command. If the NextToken field is empty, all response records have been retrieved for the request. </p>', 'DescribeTableResponse$TableName' => '<p>The table name. </p>', 'ExecuteStatementException$Message' => '<p>The exception message.</p>', 'ExecuteStatementException$StatementId' => '<p>Statement identifier of the exception.</p>', 'ExecuteStatementInput$Database' => '<p>The name of the database. This parameter is required when authenticating using temporary credentials.</p>', 'ExecuteStatementInput$DbUser' => '<p>The database user name. This parameter is required when authenticating using temporary credentials. </p>', 'ExecuteStatementOutput$Database' => '<p>The name of the database.</p>', 'ExecuteStatementOutput$DbUser' => '<p>The database user name.</p>', 'Field$stringValue' => '<p>A value of the string data type. </p>', 'GetStatementResultRequest$NextToken' => '<p>A value that indicates the starting point for the next set of response records in a subsequent request. If a value is returned in a response, you can retrieve the next set of records by providing this returned NextToken value in the next NextToken parameter and retrying the command. If the NextToken field is empty, all response records have been retrieved for the request. </p>', 'GetStatementResultResponse$NextToken' => '<p>A value that indicates the starting point for the next set of response records in a subsequent request. If a value is returned in a response, you can retrieve the next set of records by providing this returned NextToken value in the next NextToken parameter and retrying the command. If the NextToken field is empty, all response records have been retrieved for the request. </p>', 'InternalServerException$Message' => '<p>The exception message.</p>', 'ListDatabasesRequest$Database' => '<p>The name of the database. This parameter is required when authenticating using temporary credentials. </p>', 'ListDatabasesRequest$DbUser' => '<p>The database user name. This parameter is required when authenticating using temporary credentials. </p>', 'ListDatabasesRequest$NextToken' => '<p>A value that indicates the starting point for the next set of response records in a subsequent request. If a value is returned in a response, you can retrieve the next set of records by providing this returned NextToken value in the next NextToken parameter and retrying the command. If the NextToken field is empty, all response records have been retrieved for the request. </p>', 'ListDatabasesResponse$NextToken' => '<p>A value that indicates the starting point for the next set of response records in a subsequent request. If a value is returned in a response, you can retrieve the next set of records by providing this returned NextToken value in the next NextToken parameter and retrying the command. If the NextToken field is empty, all response records have been retrieved for the request. </p>', 'ListSchemasRequest$ConnectedDatabase' => '<p>A database name. The connected database is specified when you connect with your authentication credentials. </p>', 'ListSchemasRequest$Database' => '<p>The name of the database that contains the schemas to list. If <code>ConnectedDatabase</code> is not specified, this is also the database to connect to with your authentication credentials.</p>', 'ListSchemasRequest$DbUser' => '<p>The database user name. This parameter is required when authenticating using temporary credentials. </p>', 'ListSchemasRequest$NextToken' => '<p>A value that indicates the starting point for the next set of response records in a subsequent request. If a value is returned in a response, you can retrieve the next set of records by providing this returned NextToken value in the next NextToken parameter and retrying the command. If the NextToken field is empty, all response records have been retrieved for the request. </p>', 'ListSchemasRequest$SchemaPattern' => '<p>A pattern to filter results by schema name. Within a schema pattern, "%" means match any substring of 0 or more characters and "_" means match any one character. Only schema name entries matching the search pattern are returned. </p>', 'ListSchemasResponse$NextToken' => '<p>A value that indicates the starting point for the next set of response records in a subsequent request. If a value is returned in a response, you can retrieve the next set of records by providing this returned NextToken value in the next NextToken parameter and retrying the command. If the NextToken field is empty, all response records have been retrieved for the request. </p>', 'ListStatementsRequest$NextToken' => '<p>A value that indicates the starting point for the next set of response records in a subsequent request. If a value is returned in a response, you can retrieve the next set of records by providing this returned NextToken value in the next NextToken parameter and retrying the command. If the NextToken field is empty, all response records have been retrieved for the request. </p>', 'ListStatementsResponse$NextToken' => '<p>A value that indicates the starting point for the next set of response records in a subsequent request. If a value is returned in a response, you can retrieve the next set of records by providing this returned NextToken value in the next NextToken parameter and retrying the command. If the NextToken field is empty, all response records have been retrieved for the request. </p>', 'ListTablesRequest$ConnectedDatabase' => '<p>A database name. The connected database is specified when you connect with your authentication credentials. </p>', 'ListTablesRequest$Database' => '<p>The name of the database that contains the tables to list. If <code>ConnectedDatabase</code> is not specified, this is also the database to connect to with your authentication credentials.</p>', 'ListTablesRequest$DbUser' => '<p>The database user name. This parameter is required when authenticating using temporary credentials. </p>', 'ListTablesRequest$NextToken' => '<p>A value that indicates the starting point for the next set of response records in a subsequent request. If a value is returned in a response, you can retrieve the next set of records by providing this returned NextToken value in the next NextToken parameter and retrying the command. If the NextToken field is empty, all response records have been retrieved for the request. </p>', 'ListTablesRequest$SchemaPattern' => '<p>A pattern to filter results by schema name. Within a schema pattern, "%" means match any substring of 0 or more characters and "_" means match any one character. Only schema name entries matching the search pattern are returned. If <code>SchemaPattern</code> is not specified, then all tables that match <code>TablePattern</code> are returned. If neither <code>SchemaPattern</code> or <code>TablePattern</code> are specified, then all tables are returned. </p>', 'ListTablesRequest$TablePattern' => '<p>A pattern to filter results by table name. Within a table pattern, "%" means match any substring of 0 or more characters and "_" means match any one character. Only table name entries matching the search pattern are returned. If <code>TablePattern</code> is not specified, then all tables that match <code>SchemaPattern</code>are returned. If neither <code>SchemaPattern</code> or <code>TablePattern</code> are specified, then all tables are returned. </p>', 'ListTablesResponse$NextToken' => '<p>A value that indicates the starting point for the next set of response records in a subsequent request. If a value is returned in a response, you can retrieve the next set of records by providing this returned NextToken value in the next NextToken parameter and retrying the command. If the NextToken field is empty, all response records have been retrieved for the request. </p>', 'ResourceNotFoundException$Message' => '<p>The exception message.</p>', 'ResourceNotFoundException$ResourceId' => '<p>Resource identifier associated with the exception.</p>', 'SchemaList$member' => NULL, 'TableMember$name' => '<p>The name of the table. </p>', 'TableMember$schema' => '<p>The schema containing the table. </p>', 'TableMember$type' => '<p>The type of the table. Possible values include TABLE, VIEW, SYSTEM TABLE, GLOBAL TEMPORARY, LOCAL TEMPORARY, ALIAS, and SYNONYM. </p>', 'ValidationException$Message' => '<p>The exception message.</p>', ], ], 'TableList' => [ 'base' => NULL, 'refs' => [ 'ListTablesResponse$Tables' => '<p>The tables that match the request pattern. </p>', ], ], 'TableMember' => [ 'base' => '<p>The properties of a table. </p>', 'refs' => [ 'TableList$member' => NULL, ], ], 'Timestamp' => [ 'base' => NULL, 'refs' => [ 'DescribeStatementResponse$CreatedAt' => '<p>The date and time (UTC) when the SQL statement was submitted to run. </p>', 'DescribeStatementResponse$UpdatedAt' => '<p>The date and time (UTC) that the metadata for the SQL statement was last updated. An example is the time the status last changed. </p>', 'ExecuteStatementOutput$CreatedAt' => '<p>The date and time (UTC) the statement was created. </p>', 'StatementData$CreatedAt' => '<p>The date and time (UTC) the statement was created. </p>', 'StatementData$UpdatedAt' => '<p>The date and time (UTC) that the statement metadata was last updated.</p>', ], ], 'UUID' => [ 'base' => NULL, 'refs' => [ 'CancelStatementRequest$Id' => '<p>The identifier of the SQL statement to cancel. This value is a universally unique identifier (UUID) generated by Amazon Redshift Data API. This identifier is returned by <code>ExecuteStatment</code> and <code>ListStatements</code>. </p>', 'DescribeStatementRequest$Id' => '<p>The identifier of the SQL statement to describe. This value is a universally unique identifier (UUID) generated by Amazon Redshift Data API. This identifier is returned by <code>ExecuteStatment</code> and <code>ListStatements</code>. </p>', 'DescribeStatementResponse$Id' => '<p>The identifier of the SQL statement described. This value is a universally unique identifier (UUID) generated by Amazon Redshift Data API. </p>', 'ExecuteStatementOutput$Id' => '<p>The identifier of the statement to be run. This value is a universally unique identifier (UUID) generated by Amazon Redshift Data API. </p>', 'GetStatementResultRequest$Id' => '<p>The identifier of the SQL statement whose results are to be fetched. This value is a universally unique identifier (UUID) generated by Amazon Redshift Data API. This identifier is returned by <code>ExecuteStatment</code> and <code>ListStatements</code>. </p>', 'StatementData$Id' => '<p>The SQL statement identifier. This value is a universally unique identifier (UUID) generated by Amazon Redshift Data API. </p>', ], ], 'ValidationException' => [ 'base' => '<p>The Amazon Redshift Data API operation failed due to invalid input. </p>', 'refs' => [], ], 'bool' => [ 'base' => NULL, 'refs' => [ 'ColumnMetadata$isCaseSensitive' => '<p>A value that indicates whether the column is case-sensitive. </p>', 'ColumnMetadata$isCurrency' => '<p>A value that indicates whether the column contains currency values.</p>', 'ColumnMetadata$isSigned' => '<p>A value that indicates whether an integer column is signed.</p>', ], ], ],];