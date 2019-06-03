<div id="content">
    <section>
        <div>
            <header>
                <div>
                    <h2 class="section_titel">
                        Add New Cards
                    </h2>
                </div>
            </header>
            <article>
                <div>
                    <h3 class="section_subtitel">Here you can add new cards to our Database</h3>
                </div>
                <form id="cf_cardform" class="pure-form pure-form-aligned login_centered">
                <fieldset>
                    <div class="cf_row">
                        <div class="cf_left">
                            <h3>Card Name</h3>
                        </div>
                        <div class="cf_right">
                            <input class="cf_right_fill" type="text" placeholder="card name" />
                        </div>
                    </div>
                    <div class="cf_row">
                        <div class="cf_left">
                            <h3>Mana Cost</h3>
                        </div>
                        <div class="cf_right">
                            <input class="cf_right_fill" type="text" placeholder="mana cost (G,R,B,U,W,3)" />
                        </div>
                    </div>
                    <div class="cf_row">
                        <div class="cf_left">
                            <h3>Type</h3>
                        </div>
                        <div class="cf_right">
                            <div class="cf_right_fill cf_cardtype_chkbx" id="cf_cardtype">
                                <div>
                                    <input type="checkbox" id="cf_land"/>
                                    <label for="cf_land" >land</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="cf_creature"/>
                                    <label for="cf_creature" >creature</label>
                                </div>

                                <div>
                                    <input type="checkbox" id="cf_artifact"/>
                                    <label for="cf_artifact" >artifact</label>
                                </div>

                                <div>
                                    <input type="checkbox" id="cf_sorcery"/>
                                    <label for="cf_sorcery" >sorcery</label>
                                </div>

                                <div>
                                    <input type="checkbox" id="cf_instant"/>
                                    <label for="cf_instant" >instant</label>
                                </div>

                                <div>
                                    <input type="checkbox" id="cf_enchantment"/>
                                    <label for="cf_enchantment" >enchantment</label>
                                </div>

                                <div>
                                    <input type="checkbox" id="cf_legendary"/>
                                    <label for="cf_legendary" >legendary</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cf_row">
                        <div class="cf_left">
                            <h3>Subtype</h3>
                        </div>
                        <div class="cf_right">
                            <input class="cf_right_fill" type="text" placeholder="subtype (separate by comma)"/>
                        </div>
                    </div>

                    <div class="cf_row">
                        <div class="cf_left">
                            <h3>Text</h3>
                        </div>
                        <div class="cf_right" id="fix_textarea">
                            <textarea class="cf_right_fill" id="cf_cardtext"></textarea>
                        </div>
                    </div>

                    <div class="cf_row">
                        <div class="cf_left">
                            <h3>Power / Toughness</h3>
                        </div>
                        <div class="cf_right">
                                <input type="text" id="cf_power" placeholder="Power"/>
                                <input type="text" id="cf_toughness" placeholder="Toughness"/>
                        </div>
                    </div>
                    <div class="cf_row">
                        <div class="cf_left">
                            <h3>Artist</h3>
                        </div>
                        <div class="cf_right">
                                <input class="cf_right_fill" type="text" id="cf_artist" placeholder="Artist"/>
                        </div>
                    </div>
                    <div class="cf_row">
                        <div class="cf_left">
                            <h3>Rarity</h3>
                        </div>
                        <div class="cf_right">
                            <select class="cf_right_fill" id="cf_rarity"/>
                                <option>Common</option>
                                <option>Uncommon</option>
                                <option>Rare</option>
                                <option>Mythic Rare</option>
                                <option>Timeshifted</option>
                            </select>
                        </div>
                    </div>



                    <div class="cf_row">
                        <div class="cf_right">
                            <button class="pure-button pure-button-primary login_button" type="submit" id="cf_submit" >submit</button>
                        </div>
                    </div>
                </fieldset>
                </form>
            </article>

        </div>
    </section>

</div>
