players = game.Players:GetChildren()
localplayer = game.Players.LocalPlayer
screenGUI = Instance.new("ScreenGui",localplayer.PlayerGui)
frameM = Instance.new("Frame",screenGUI)
frame = Instance.new("Frame",frameM)
frameM.Size = UDim2.new(0,114,0, 280)
frameM.Position = UDim2.new(0.898, 0,0.062, 0)
frame.Size = UDim2.new(1,0,1,0)
function refresh()
	frame:ClearAllChildren()
	Instance.new("UIListLayout",frame)
	players = game.Players:GetChildren()
	for	v,i in players do
		local button = Instance.new("TextButton",frame)
		button.Size = UDim2.new(0,114,0, 20)
		button.Text = i.Name
		button.MouseButton1Click:connect(function()
			localplayer.Character.HumanoidRootPart.CFrame = i.Character.HumanoidRootPart.CFrame + Vector3.new(0,10,0)
		end)
	end
end
refreshB = Instance.new("TextButton",frameM)
refreshB.Text = "refresh"
refreshB.Position = UDim2.new(0,0,1,0)
refreshB.Size = UDim2.new(1,0,0,20)
refreshB.MouseButton1Click:Connect(refresh)