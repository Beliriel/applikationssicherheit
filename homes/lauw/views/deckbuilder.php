<script src="./js/deckbuilder_validation.js"></script>
<script src="./js/functions.js"></script>





<div id="content">

    <section>
        <div>

            <div>
                <h2 class="section_titel">
                    Deckbuilder
                </h2>
            </div>

            <article>
                <div>
                    <h3 class="section_subtitel">Build and Manage your Decks</h3>
                </div>
                <div id="paragraph_deckbuilder">
                    <p>On this page you are able to look for spefic cards with all their stats and put together your
                        own deck. This page helps you to get the most out of your cardcollection by letting you sort
                        them by type, rarity etc etc.</p>
                </div>
                <form id="add_cards_form" action="db_add_cards" method="post">

<div class="select_deckbuilder_deck">
<label>Select your deck here</label>
<select id="select_deck" name="select_deck">
<?php
    $reg_db = new mysqli("127.0.0.1", "root", "", "kerstingk");
    $decksquery = "SELECT DeckName FROM deck";
    $deckresult = $reg_db->query($decksquery);
    $deckrow = $deckresult->fetch_assoc();
?>
    <?php while($deckrow != NULL){

        $deckTitle = $deckrow["DeckName"];
            echo '<option value="'.$deckTitle.'" >'.$deckTitle.'</option>';
            $deckrow = $deckresult->fetch_assoc();
    }
    ?>
</select>
<button type="submit" id="add_cards" class="pure-button pure-button-primary login_button" disabled="disabled">Add Cards</button>
</div>
</form>


                <!-- <div class="select_deckbuilder_deck">
                    <label>Select your deck here</label>
                    <select id="select_deck" name="select_deck">
                        <option value="" selected="selected">-</option>
                        <option value="1">My First Deck</option>
                        <option value="2">Special Powerfull Decky Deck</option>
                        <option value="3">Bliblablu</option>
                        <option value="4">Over9000</option>
                    </select>
                    <button type="submit" id="add_cards" class="pure-button pure-button-primary login_button" disabled="disabled">Add Cards</button>
                </div> -->








            </article>
        </div>
    </section>
    <div style="break:both;"></div>
    <div id="actual_deckbuilder">
        <div id="deckbuilder_left">
            <form action = "filter_deckbuilder" class="pure-form" method="post">
            <div id="select_form_left">

                <div class="select_form_left_box">
                    <label for="type">Type</label>
                    <br/>
                    <select id="select_type1"class="pure-form input" name="type1" >
                        <option value="" selected="selected">Must pick</option>
                        <option value="Basic">Basic</option>
                        <option value="Legendary">Legendary</option>
                        <option value="Creature">Creature</option>
                        <option value="Entchantment">Entchantment</option>
                        <option value="Instant">Instant</option>
                        <option value="Sorcery">Sorcery</option>
                        <option value="Artifact">Artifact</option>
                        <option value="Tribal">Tribal</option>
                        <option value="Planeswalker9">Planeswalker</option>
                        <option value="Land">Land</option>
                    </select>

                    <select id="select_type2" class="pure-form input" name="type2">
                            <option value="" selected="selected">-</option>
                            <option value="Creature">Creature</option>
                            <option value="Entchantment">Entchantment</option>
                            <option value="Instant">Instant</option>
                            <option value="Sorcery">Sorcery</option>
                            <option value="Artifact">Artifact</option>
                            <option value="Planeswalker9">Planeswalker</option>
                            <option value="Land">Land</option>
                        </select>
                </div>

                <div class="select_form_left_box">
                    <label>Colors</label>   <br/>
                    <label>White</label>
                    <input id="filter_white" type="checkbox"  name="white" value="white" />
                    <label>Blue</label>
                    <input id="filter_blue" type="checkbox" name="blue" value="blue" />
                    <label>Black</label>
                    <input id="filter_black" type="checkbox" name="black" value="black" />
                    <label>Red</label>
                    <input id="filter_red" type="checkbox" name="red" value="red" />
                    <label>Green</label>
                    <input id="filter_green" type="checkbox" name="green" value="green" />
                </div>



                 <div class="select_form_left_box">
                    <label>Name of a Card</label>
                    <br/>
                    <input id="filter_cardname" class="pure-form input" type="text"  name="cardname" placeholder="Filter a Cardname">
                 </div>

                <div class="select_form_left_box">
                    <label>Subtype</label>
                    <br/>
                    <input id="subtype1" class="pure-form input" type="text"  name="subtype1" placeholder="Type first Subtype">
                    <input id="subtype2" class="pure-form input" type="text"  name="subtype2"placeholder="Type second Subtype">
                </div>

                <div class="select_form_left_box">
                    <label>Abilities</label>
                    <br/>
                    <input id="ability1" class="pure-form input" type="text"  name="ability1" placeholder="Type first Ability">
                    <input id="ability2" class="pure-form input" type="text" name="ability2" placeholder="Type second Ability">
                    <input id="ability3" class="pure-form input" type="text" name="ability3"  placeholder="Type third Ability">
                </div>

                <div class="select_form_left_box">
                    <label>Rarity</label>
                    <br/>
                    <select class="pure-form input" name="rarity" required>
                        <option value="" selected="selected">-</option>
                        <option value="Common">Common</option>
                        <option value="Uncommon">Uncommon</option>
                        <option value="Rare">Rare</option>
                        <option value="Mythic Rare">Mythic Rare</option>
                    </select>
                </div>

                <div class="select_form_left_box">
                    <label>Expansion</label>
                    <br/>
                    <input id="expansion" class="pure-form input" type="text" name="expansion" placeholder="Type Expansion">
                </div>

                <button type="submit" id="filter" class="pure-button pure-button-primary login_button" disabled="disabled" onClick="validateForm_Deckbuilder()">Filter</button>
            </div>
        </form>
        </div>
        <div id="deckbuilder_right">
            <div class="deckbuilder_content">
            <section>
                <form id="add_cards_form" action="db_add_cards" method="post">

                <div class="deckbuilder_card_content">
                    <h3><?php echo $cardname;?></h3>
                    <div class="deckbuilder_card">
                    </div>
                    <p><?php echo $cardtext;?></p>
                    <input class="card_checkbox" type="checkbox"  name="checkbox_card[]" required onClick="" >
                </div>


            </div>
            </form>
            </section>

        </div>
        </div>
    </div>
</div>
