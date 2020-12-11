TriggerEvent('es:addCommand', 'hud', function(source, args)
	if not args then 
		TriggerClientEvent('chatMessage', source, "[Begriff]", {255, 0, 0}, "/hud [an|aus]") 
	else
	local a = tostring(args[1])
		if a == "aus" then
			TriggerClientEvent('ui:toggle', source,false)
		elseif a == "an" then
			TriggerClientEvent('ui:toggle', source,true)
		else
			TriggerClientEvent('chatMessage', source, "[Begriff]", {255, 0, 0}, "/hud [an|aus]") 
		end
	end
end)
