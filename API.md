
# API for the DB queries

## Output

All requests made to the query file will have a JSON output, which format
depends on the command input.

## Errors

If an error went to occur, the query file will return a JSON object in the
following format:

	{
		'type': <error type>,
		'error': <error string>
	}

## Arguments

Along with a command, you can supply additional arguments.
Supplying arguments if pretty straight forward in PHP, example:

	?cmd=myCommand&argumentName=arguementValue

## Commands

### getCompanies

Wether you provide an additional argument or not, the output of the
getCompanies command will have the following format:

	[
		{
			'id' : <id>,
			'name' : <name>,
			…
		},
	]

This array of companies will have different fields in each entry, depending on
the column names chosen in the database.

#### No argument
_Output_: every company in the database

#### byName
_Output_: every company whose name contains the given string (case insensitive)
_Input_: string to be searched in the companies name

### getTags

This command doesn't take any argument, and returns an array of all tags that
were used to describe the companies in the database.
