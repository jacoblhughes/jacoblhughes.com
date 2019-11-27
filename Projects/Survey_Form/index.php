<body>
    <h2 id="description">Please fill out this form so I can get to know you better!</h2>

    <form id="survey-form" class="container">
        <fieldset class="fieldSet">
            <label id="name-label" for="name">Name: </label>
            <input id="name" placeholder="Enter your name" type="text" value="" required>
        </fieldset>
        <fieldset class="fieldSet">
            <label id="email-label" for="name">Email: </label>
            <input id="email" placeholder="Enter your email" type="email" value="" required>
        </fieldset>
        <fieldset class="fieldSet">
            <label id="number-label" for="name">Age: </label>
            <input id="number" placeholder="Enter your age (13-99)" type="number" value="" min="13" max="99" required>
        </fieldset>
        <fieldset class="fieldSet">
            <label id="option-label">Why Are You Learning To Code?:</label>
            <input list="option" placeholder="Click Here">
            <datalist id="option">
                <option value="Future Job">
                    <option value="Hobby">
                        <option value="To Impress Chicks">
            </datalist>
        </fieldset>
        <fieldset class="fieldSet">
            <label id="duration-label">How Long Have You Been Coding?:</label>
            <input type="radio" name="duration" value="Less Than 1 Year" checked> Less Than 1 Year
            <input type="radio" name="duration" value="1-5 Years"> 1-5 Years
            <input type="radio" name="duration" value="More Than 5 Years"> More Than 5 Years
        </fieldset>
        <fieldset class="fieldSet">
            <label id="hours-label">On Average, How Many Hours A Day Do You Code?:</label>
            <input type="radio" name="hours" value="1" checked> 1
            <input type="radio" name="hours" value="2"> 2
            <input type="radio" name="hours" value="3"> 3
            <input type="radio" name="hours" value="4"> 4
            <input type="radio" name="hours" value="5"> 5
            <input type="radio" name="hours" value="6"> 6
            <input type="radio" name="hours" value="7"> 7
            <input type="radio" name="hours" value="8"> 8
            <input type="radio" name="hours" value="8+"> 8+
        </fieldset>
        <fieldset class="fieldSet">
            <label id="hours-label">What Languages Do You Work With?:</label>
            <input type="checkbox" name="hours" value="HTML"> HTML
            <input type="checkbox" name="hours" value="CSS"> CSS
            <input type="checkbox" name="hours" value="Javascript"> Javascript
            <input type="checkbox" name="hours" value="PHP"> PHP
            <input type="checkbox" name="hours" value="C++"> C++
            <input type="checkbox" name="hours" value="Python"> Python
            <input type="checkbox" name="hours" value="Ruby"> Ruby
        </fieldset>
        <fieldset class="fieldSet">
            <textarea rows="4" cols="50">Place additional comments here!
            </textarea>
        </fieldset>
        <fieldset class="fieldSet">
            <button id="submit" type="submit">Submit</button>
        </fieldset>
    </form>
</body>