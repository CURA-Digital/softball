<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/main.css">
    </head>
    <body>
        <?php
        // Define softball positions and players
        $players = ['Bentley', 'Alyssa', 'Chloe', 'Elaina', 'Emmy', 'Harper', 'Isla', 'Katelyn', 'Lily', 'Vanessa'];
        $positions6 = ['Pitcher', 'Catcher', '1st', '2nd', 'SS', '3rd'];
        $positions7 = ['Pitcher', 'Catcher', '1st', '2nd', 'SS', '3rd', 'CF'];
        $positions8 = ['Pitcher', 'Catcher', '1st', '2nd', 'SS', '3rd', 'LF', 'RF'];
        $positions9 = ['Pitcher', 'Catcher', '1st', '2nd', 'SS', '3rd', 'LF', 'CF', 'RF'];
        $positions10 = ['Pitcher', 'Catcher', '1st', '2nd', 'SS', '3rd', 'LF', 'CLF', 'CRF', 'RF'];
        $positions11 = ['Pitcher', 'Catcher', '1st', '2nd', 'SS', '3rd', 'LF', 'CLF', 'CF', 'CRF', 'RF'];
        $infield = ['Pitcher', 'Catcher', '1st', '2nd', 'SS', '3rd'];
        $outfield = ['LF', 'CLF', 'CF', 'CRF', 'RF'];

        // Set positions based on number of players
        switch (count($players)) {
            case 6:
                $positions = $positions6;
                break;
            case 7:
                $positions = $positions7;
                break;
            case 8:
                $positions = $positions8;
                break;
            case 9:
                $positions = $positions9;
                break;
            case 10:
                $positions = $positions10;
                break;
            case 11:
                $positions = $positions11;
                break;
            default:
                $positions = $positions6;
        }

        // Create an empty team array
        $team = [];

        // Create an array to keep track of player positions
        $playerPositions = array_fill_keys($players, []);

        // play 6 innings
        $innings = 6;
        
        // For each inning assign players to a position
        for ($inning = 1; $inning <= $innings; $inning++) {
            
            //assign players to positions
            $team[$inning] = [];

            // Set available positions for the current inning
            $availablePositions = $positions;

            // Each inning assign each player to a new position
            foreach ($players as $player) {

                // Find a position that the player has not played before in this game
                $availablePlayerPositions = array_diff($positions, $playerPositions[$player]);
                $position = array_shift($availablePlayerPositions);

                // Assign the player to the position for the current inning
                $team[$inning][$player] = $position;

                // Remove the assigned position from available positions
                $positions = array_values(array_diff($positions, [$position]));

            }

        }

        // Output the randomized team for each inning
        foreach ($team as $inning => $players) {
            echo "<div class='inning'><h2>Inning $inning:</h2>\n";
            ksort($players); // Sort players alphabetically
            foreach ($players as $player => $position) {
                echo "<p>$player: $position</p>\n";
            }
            echo "</div>\n";
        }




        ?>
    </body>
</html>
