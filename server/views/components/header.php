<header>
    <div class="bannerContainer">
        <div class="bannerWrapper">
            <img src="public/images/caRent.png" alt="caRent"/>
            <button class="btn" onclick="toggleOverlay()">Car Request</button>
            <script>
                window.onload = function() {
                    document.onclick = function (e) {
                        if (e.target.id == 'overlay') {
                            document.getElementsByClassName("overlay")[0].style.display = "none";
                        }
                    }
                }
                
                function toggleOverlay() {
                    document.getElementsByClassName("overlay")[0].style.display = "grid";
                }
            </script>
        </div>
    </div>
    <div id="overlay" class="overlay">
        <form id="overlayForm">
            <h2>Car Booking</h2>
            <h3>Pick up location</h3>
            <div>
                <select id="region" name="region" onchange="set_country(this,country,city_state)" size="1" required>
                    <option value="" selected="selected">SELECT REGION</option>
                    <option value="Africa">Africa</option>
                    <option value="Asia">Asia</option>
                    <option value="Australia/Oceania">Australia/Oceania</option>
                    <option value="Caribbean">Caribbean</option>
                    <option value="Central America">Central America</option>
                    <option value="Europe">Europe</option>
                    <option value="Islands">Islands</option>
                    <option value="Middle East">Middle East</option>
                    <option value="North America">North America</option>
                    <option value="South America">South America</option>
                    <script type="text/javascript">setRegions(this);</script>
                </select>
            </div>
            <div>
                <select id="country" name="country" size="1" disabled="disabled" onchange="set_city_state(this,city_state)" required></select>
            </div>
            <div>
                <select id="city" name="city_state" size="1" disabled="disabled" onchange="print_city_state(country,this)" required></select>
            </div>
            <div>
                <label>Start Date & Time</label>
                <input type="date" name="startDate" required>
                <input type="time" name="startTime" required>
            </div>
            <div>
                <label>End Date & Time</label>
                <input type="date" name="endDate" required>
                <input type="time" name="endTime" required>
            </div>
            <div style="border-top: 1px solid #9C9C9C; margin-top: 1em; padding-top: 1.5em;">
                <input type="email" name="email" placeholder="Email" autocomplete="off" required style="width: 68%; border: 1px solid #3C3C3C;">
                <button type="submit" name="submit">Book</button>
            </div>
        </form>
    </div>
</header>