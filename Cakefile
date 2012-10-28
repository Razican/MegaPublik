{exec} = require 'child_process'
task 'build', 'Build project from files/coffee/*.coffee to javascript/*.js', ->
	exec 'coffee --compile --output files/coffeescript/javascript/ files/coffeescript/', (err, stdout, stderr) ->
		throw err if err
		console.log stdout + stderr