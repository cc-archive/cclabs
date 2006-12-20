<? $head_extra = '

    <script type="text/javascript">
      //<![CDATA[
      Event.onDOMReady(totit);
      //]]>
    </script>

'; ?>

<? include_once "_header.php"; ?>

<div id="content">
  <h2>Returning Author's Rights: The CC Termination of Transfer Tool</h2>

       <form id="term_form">
          <div id="history" class="invisible">
            <div id="h-wfh-emp" class="section1">
              <div class="history-header">Employee Created Work:</div>
              <div id="h-wfh-emp-ans" class="answer">YES/NO</div>
              <br clear="both" />
            </div>
            <div id="h-wfh-com" class="section1">
              <div class="history-header">Commissioned Work:</div>
              <div id="h-wfh-com-ans" class="answer">YES/NO</div>
              <br clear="both" />
            </div>
            <div id="h-wfh-pre" class="section1">
              <div class="history-header">Work Created Before 1978:</div>
              <div id="h-wfh-pre-ans" class="answer">YES/NO</div>
              <br clear="both" />
            </div>
            <div id="h-wfh-wri" class="section1">
              <div class="history-header">Signed Written Agreement:</div>
              <div id="h-wfh-wri-ans" class="answer">YES/NO</div>
              <br clear="both" />
            </div>
            <div id="h-wfh-catA" class="section1">
              <div class="history-header">Movie, Translation, Test, etc:</div>
              <div id="h-wfh-catA-ans" class="answer">YES/NO</div>
              <br clear="both" />
            </div>
            <div id="h-wfh-catB" class="section1">
              <div class="history-header">Collective Work:</div>
              <div id="h-wfh-catB-ans" class="answer">YES/NO</div>
              <br clear="both" />
            </div>
            <div id="h-wfh-catC" class="section1">
              <div class="history-header">Supplementary Work:</div>
              <div id="h-wfh-catC-ans" class="answer">YES/NO</div>
              <br clear="both" />
            </div>
            <div id="h-cdate" class="section2">
              <div class="history-header">Creation Date:</div>
              <div id="h-cdate-ans" class="answer">MM/DD/YYYY</div>
              <br clear="both" />
            </div>
            <div id="h-pdate" class="section2">
              <div class="history-header">Publish Date:</div>
              <div id="h-pdate-ans" class="answer">MM/DD/YYYY</div>
              <br clear="both" />
            </div>
            <div id="h-gdate" class="section2">
              <div class="history-header">Transfer Date:</div>
              <div id="h-gdate-ans" class="answer">MM/DD/YYYY</div>
              <br clear="both" />
            </div>
            <div id="h-names" class="section3">
              <div class="history-header">Authors:</div>
              <div id="h-names-ans" class="answer">NAMES</div>
              <br clear="both" />
            </div>
            <div id="h-basic" class="section3">
              <div>
                <div class="history-header">Title:</div>
                <div id="h-basic-title" class="answer">TITLE</div>
                <br clear="both" />
              </div>
              <div>
                <div class="history-header">Registration Number:</div>
                <div id="h-basic-ocn" class="answer">OCN</div>
                <br clear="both" />
              </div>
              <div>
                <div class="history-header">Original Grantee:</div>
                <div id="h-basic-original-grantee" class="answer">GRANTEE</div>
                <br clear="both" />
              </div>
              <div>
                <div class="history-header">Current Grantee:</div>
                <div id="h-basic-current-grantee" class="answer">GRANTEE</div>
                <br clear="both" />
              </div>
              <div>
                <div class="history-header">Description:</div>
                <div id="h-basic-desc" class="answer">GRANT DESCRIPTION</div>
                <br clear="both" />
              </div>
            </div>
            <div id="h-agrant" class="section4">
              <div class="history-header">Author Grant:</div>
              <div id="h-agrant-ans" class="answer">YES/NO</div>
              <br clear="both" />
            </div>
            <div id="h-sgrant" class="section4">
              <div class="history-header">Successor Grant:</div>
              <div id="h-sgrant-ans" class="answer">YES/NO</div>
              <br clear="both" />
            </div>
            <div id="h-grantors" class="section4">
              <div class="history-header">Grantor(s):</div>
              <div id="h-grantors-ans" class="answer">AUTHOR NAMES</div>
              <br clear="both" />
            </div>
            <div id="h-familytree" class="section4"></div>
            <div id="h-auth-info" class="section4">
              <div class="history-header">Family Tree:</div>
              <div id="h-auth-info-ans" class="answer">AUTHOR NAME</div>
              <br clear="both" />
            </div>
            <div id="h-auth-info-spouse" class="section4">
              <div>
                <div class="history-header">Spouse:</div>
                <div id="h-auth-info-spouse-name" class="answer">SPOUSE NAME</div>
                <br clear="both" />
              </div>
            </div>
            <div id="h-auth-info-nospouse" class="section4">
              <div class="history-header">No Spouse</div>
              <br clear="both" />
            </div>
            <div id="h-auth-info-nochildren" class="section4">
              <div class="history-header">No Children</div>
              <br clear="both" />
            </div>
            <div id="h-auth-info-child" class="section4">
              <div>
                <div class="history-header">Child:</div>
                <div id="h-auth-info-child-ans" class="answer">CHILD NAME</div>
                <br clear="both" />
              </div>
            </div>
            <div id="h-auth-info-nograndchildren" class="section4">
              <div class="history-header">No Grandchildren</div>
              <br clear="both" />
            </div>
            <div id="h-auth-info-grandchild" class="section4">
              <div>
                <div class="history-header">Grandchild:</div>
                <div id="h-auth-info-grandchild-ans" class="answer">GRANDCHILD NAME</div>
                <br clear="both" />
              </div>
            </div>
 
          </div>

          <div id="screens" class="invisible">

            <div id="employee">
              <div class="screen-titlebar section1">
              <span class="screen-header">What can be terminated?</span>
              <span class="progress">Section 1</span>
              <br clear="both" />
              </div>
              <div class="question">
                <div class="question-text">
                  Did you, or the <a class="glossarylink" href="glossary.html#author">author or artist</a>,
                  <br> create the <a class="glossarylink" href="glossary.html#work">work</a> within the <br>
                  <a class="glossarylink" href="glossary.html#scope_of_employment">scope of your, or his or her, employment</a>?
                </div>
                <div class="question-options">
                  <div class="option">
                    <div class="option-input">
                      <input type="radio" name="employee" value="Yes" />
                    </div>
                    <div class="option-text">Yes</div>
                  </div>
                  <div class="option">
                    <div class="option-input">
                      <input type="radio" name="employee" value="No" />
                    </div>
                    <div class="option-text">No</div>
                  </div>
                </div>
                <div class="question-error">
                  Required Field
                </div>
                <br clear="both"/>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- employee -->

            <div id="commissioned">
              <div class="screen-titlebar section1">
              <span class="screen-header">What can be terminated?</span>
              <span class="progress">Section 1</span>
              <br clear="both" />
              </div>
              <div class="question">
                <div class="question-text">
                  Was the <a class="glossarylink" href="glossary.html#work">work</a>
                  created in response to a special order or commission by
                  some other person or company?
                </div>
                <div class="question-options">
                  <div class="option">
                    <div class="option-input">
                      <input type="radio" name="commissioned" value="Yes" />
                    </div>
                    <div class="option-text">Yes</div>
                  </div>
                  <div class="option">
                    <div class="option-input">
                      <input type="radio" name="commissioned" value="No" />
                    </div>
                    <div class="option-text">No</div>
                  </div>
                </div>
                <div class="question-error">
                  Required Field
                </div>
                <br clear="both"/>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- commissioned -->

            <div id="pre1978">
              <div class="screen-titlebar">
              <span class="screen-header">What can be terminated?</span>
              <span class="progress">Section 1</span>
              <br clear="both" />
              </div>
              <div class="question">
                <div class="question-text">
                  Was the <a class="glossarylink" href="glossary.html#work">work</a>
                  created before January 1st, 1978?
                </div>
                <div class="question-options">
                  <div class="option">
                    <div class="option-input">
                      <input type="radio" name="pre1978" value="Yes" />
                    </div>
                    <div class="option-text">Yes</div>
                  </div>
                  <div class="option">
                    <div class="option-input">
                      <input type="radio" name="pre1978" value="No" />
                    </div>
                    <div class="option-text">No</div>
                  </div>
                </div>
                <div class="question-error">
                  Required Field
                </div>
                <br clear="both"/>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- pre1978 -->

            <div id="written_agreement">
              <div class="screen-titlebar">
              <span class="screen-header">What can be terminated?</span>
              <span class="progress">Section 1</span>
              <br clear="both" />
              </div>
              <div class="question">
                <div class="question-text">
                  Was there a <a class="glossarylink" href="glossary.html#written_agreement">written agreement</a>
                  regarding the special order or commission
                  which explicitly refers to the work as a
                  <a class="glossarylink" href="glossary.html#work_for_hire">"work for hire?"</a>
                </div>
                <div class="question-options">
                  <div class="option">
                    <div class="option-input">
                      <input type="radio" name="written" value="Yes" />
                    </div>
                    <div class="option-text">Yes</div>
                  </div>
                  <div class="option">
                    <div class="option-input">
                      <input type="radio" name="written" value="No" />
                    </div>
                    <div class="option-text">No</div>
                  </div>
                </div>
                <div class="question-error">
                  Required Field
                </div>
                <br clear="both"/>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- written_agreement -->

            <div id="categoryA">
              <div class="screen-titlebar">
              <span class="screen-header">What can be terminated?</span>
              <span class="progress">Section 1</span>
              <br clear="both" />
              </div>
              <div class="question">
                <div class="question-text">
                  Was the <a class="glossarylink" href="glossary.html#work">work</a> created for use as one of the following?
                </div>
                <div class="question-options">
                  <div class="option">
                    <div class="option-input">
                      <input type="radio" name="categoryA" value="Yes" />
                    </div>
                    <div class="option-text">Yes</div>
                  </div>
                  <div class="option">
                    <div class="option-input">
                      <input type="radio" name="categoryA" value="No" />
                    </div>
                    <div class="option-text">No</div>
                  </div>
                </div>
                <div class="question-error">
                  Required Field
                </div>
                <br clear="both"/>
              </div>
              <div style="clear:left;">
                <!-- category list (part A) -->
                <ul class="term-category-list">
                  <li>part of a motion picture or other audiovisual work</li>
                  <li>a translation</li>
                  <li>a test</li>
                  <li>answer material for a test</li>
                  <li>an atlas</li>
                  <li>as an instructional text (text and/or graphics)</li>
                </ul>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- categoryA -->

            <div id="categoryB">
              <div class="screen-titlebar">
              <span class="screen-header">What can be terminated?</span>
              <span class="progress">Section 1</span>
              <br clear="both" />
              </div>
              <div class="question">
                <div class="question-text">
                  Was the <a class="glossarylink" href="glossary.html#work">work</a> created for use as one of the following?
                </div>
                <div class="question-options">
                  <div class="option">
                    <div class="option-input">
                      <input type="radio" name="categoryB" value="Yes" />
                    </div>
                    <div class="option-text">Yes</div>
                  </div>
                  <div class="option">
                    <div class="option-input">
                      <input type="radio" name="categoryB" value="No" />
                    </div>
                    <div class="option-text">No</div>
                  </div>
                </div>
                <div class="question-error">
                  Required Field
                </div>
                <br clear="both"/>
              </div><!-- category list (part B) -->
              <div>
                <ul class="term-category-list">
                  <li>a <a class="glossarylink" href="glossary.html#compilation">"compilation,"</a> such as: 
                    <ul>
                      <li>catalogs</li>
                      <li>directories</li>
                    </ul>
                  </li>
                  <li>a "contribution to a <a class="glossarylink" href="glossary.html#collective_work">collective work</a>," such as a contribution to a(n): 
                    <ul>
                      <li>magazine</li>
                      <li>anthology</li>
                      <li>encyclopedia</li>
                    </ul>
                  </li>
                </ul>
                <p>
                  The examples given for the types of things that
                  qualify as compilations and collective works are
                  illustrative only. If you think that the work you
                  or the <a class="glossarylink" href="glossary.html#author">author or artist</a>
                  created is likely to be a
                  compilation or collective work, you should check
                  "yes" even if it is not listed as one of the examples.
                </p>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- categoryB -->

            <div id="categoryC">
              <div class="screen-titlebar">
              <span class="screen-header">What can be terminated?</span>
              <span class="progress">Section 1</span>
              <br clear="both" />
              </div>
              <div class="question">
                <div class="question-text">
                  Was the <a class="glossarylink" href="glossary.html#work">work</a> created for use as one of the following?
                </div>
                <div class="question-options">
                  <div class="option">
                    <div class="option-input">
                      <input type="radio" name="categoryC" value="Yes" />
                    </div>
                    <div class="option-text">Yes</div>
                  </div>
                  <div class="option">
                    <div class="option-input">
                      <input type="radio" name="categoryC" value="No" />
                    </div>
                    <div class="option-text">No</div>
                  </div>
                </div>
                <div class="question-error">
                  Required Field
                </div>
                <br clear="both"/>
              </div><!-- category list (part C) -->
              <div>
                <ul class="term-category-list">
                  <li>a <a class="glossarylink" href="glossary.html#supplementary_work">"supplementary work"</a>
		  (relating to an existing work by another author), such as: 
                    <ul>
                      <li>forewords</li>
                      <li>afterwords</li>
                      <li>pictorial illustrations</li>
                      <li>maps</li>
                      <li>charts</li>
                      <li>tables</li>
                      <li>editorial notes</li>
                      <li>musical arrangements</li>
                      <li>answer material for tests</li>
                      <li>bibliographies</li>
                      <li>appendixes</li>
                    </ul>
                  </li>
                </ul>
                <p>
                  The examples of types of things qualify as
                  "supplementary works" are illustrative only.
                  If you think that
                  the work you or the <a class="glossarylink" href="glossary.html#author">author or artist</a> created
                  is likely to be a supplementary, you should
                  check "yes" even if it is not listed as one
                  of the examples.
                </p>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- categoryC -->

            <div id="create_date">
              <div class="screen-titlebar section2">
              <span class="screen-header">When can the transfer be terminated?</span>
              <span class="progress">Section 2</span>
              <br clear="both" />
              </div>
              <div class="question">
                <div class="question-text">
                  When was the
                  <a class="glossarylink" href="glossary.html#work">work</a>
                  <a class="glossarylink" href="glossary.html#creation_date">created?</a><br/>
                  <br/>
                  <!--
                  (Please enter your best recollection as to the date of creation.
                  The most important date is the year.
                  If you also know the month and/or the date of creation of the work,
                  then please include these details.)
                  -->
                </div>
                <div class="question-options">
                  <div class="option">
                    <div class="option-input">
                      <input id="cyear" type="text" class="filter-date" name="cyear" size="4" maxlength="4" value="" />
                    </div>
                    <div class="option-text">
                      <input type="text" class="date-text" size="4" value="yyyy" disabled />
                    </div>
                  </div>
                </div>
                <div class="question-error">
                  Please enter a valid date
                </div>
                <br clear="both"/>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- create_date -->

            <div id="publish_date">
              <div class="screen-titlebar section2">
              <span class="screen-header">When can the transfer be terminated?</span>
              <span class="progress">Section 2</span>
              <br clear="both" />
              </div>
              <div class="question">
                <div class="question-text">
                  When was the
                  <a class="glossarylink" href="glossary.html#work">work</a>
                  <a class="glossarylink" href="glossary.html#publication_date">first published?</a><br/>
                  <br/>
                  <!--
                  (Please enter your best recollection as to the date of first publication.
                  The most important date is the year.
                  If you also know the month and/or the date of first publication of the work,
                  then please include these details.)
                  -->
                </div>
                <div class="question-options">
                  <div class="option">
                    <div class="option-input">
                      <input id="pyear"  name="pyear"  type="text" class="filter-date" size="4" maxlength="4" value="" />
                    </div>
                    <div class="option-text">
                      <input type="text" class="date-text" size="4" value="yyyy" disabled />
                    </div>
                  </div>
                </div>
                <div class="question-error">
                  Please enter a valid date
                </div>
                <br clear="both"/>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- publish_date -->

            <div id="grant_date">
              <div class="screen-titlebar section2">
              <span class="screen-header">When can the transfer be terminated?</span>
              <span class="progress">Section 2</span>
              <br clear="both" />
              </div>
              <div class="question">
                <div class="question-text">
                  What is the date of the
                  <a class="glossarylink" href="glossary.html#agreement">agreement or transfer</a>
                  that you or the <a class="glossarylink" href="glossary.html#author">author or artist</a> entered into
                  in relation to the
                  <a class="glossarylink" href="glossary.html#work">work</a>?
                </div>
                <div class="question-options">
                  <div class="option">
                    <div class="option-input">
                      <input id="gyear" type="text" class="filter-date" name="gyear" size="4" maxlength="4" value="" />
                    </div>
                    <div class="option-text">
                      <input type="text" class="date-text" size="4" value="yyyy" disabled />
                    </div>
                  </div>
                </div>
                <div class="question-error">
                  Please enter a valid date
                </div>
                <br clear="both"/>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- grant_date -->

            <div id="author_names">
              <div class="screen-titlebar section3">
              <span class="screen-header">Tell us about the work</span>
              <span class="progress">Section 3</span>
              <br clear="both" />
              </div>
              <div>
                <div class="question">
		  <div class="question-text">
                  Please list all <a class="glossarylink" href="glossary.html#author">authors or artists</a>
                  of the <a class="glossarylink" href="glossary.html#work">work</a>:<br>
                  <a id="more_authors">[ More ]</a> <a id="less_authors">[ Less ]</a>
		  </div>
                  <div class="question-options">
                    <div id="authors_container"></div>
		    <div id="author_name" class="invisible">
		      <div class="option"><div class="option-input">
                        <span class="name_errors">Required Field</span>
                        <input class="gather-text" type="text" size="25" />
		      </div></div>
		      <br>
                      <br clear="both"/>
		    </div>
		  </div>
                </div>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- author_names -->

            <div id="basic">
              <div class="screen-titlebar section3">
              <span class="screen-header">Tell us about the work</span>
              <span class="progress">Section 3</span>
              <br clear="both" />
              </div>
              <div>
                <div class="question">
                  Please provide the following details to the extent you know them:
                </div>
                <div class="question">
                  <div class="question-text">
                    Title of <a class="glossarylink" href="glossary.html#work">Work</a>:
                  </div>
                  <div class="question-options">
                    <div class="option">
                      <div class="option-input">
                        <input id="title" type="text" name="title" class="gather-text" maxlength="50" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="question-error">
                    Required Field
                  </div>
                  <br clear="both"/>
                </div>
                <div class="question">
                  <div class="question-text">
                    <a class="glossarylink" href="glossary.html#registration_number">Copyright Registration Number</a> [optional]:
                  </div>
                  <div class="question-options">
                    <div class="option">
                      <div class="option-input">
                        <input id="ocn" type="text" name="ocn" class="gather-text" maxlength="15" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="question-error">
                    Required Field
                  </div>
                  <br clear="both"/>
                </div>
                <div class="question">
                  <div class="question-text">
                    <a class="glossarylink" href="glossary.html#grantee">Original Grantee</a>:
                  </div>
                  <div class="question-options">
                    <div class="option">
                      <div class="option-input">
                        <input id="original_grantee" name="original_grantee" type="text" class="gather-text" maxlength="50" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="question-error">
                    Required Field
                  </div>
                  <br clear="both"/>
                </div>
                <div class="question">
                  <div class="question-text">
                    <a class="glossarylink" href="glossary.html#grantee">Current Grantee</a> [optional]:
                  </div>
                  <div class="question-options">
                    <div class="option">
                      <div class="option-input">
                        <input id="current_grantee" name="current_grantee" type="text" class="gather-text" maxlength="50" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="question-error">
                    Required Field
                  </div>
                  <br clear="both"/>
                </div>
                <div class="question">
                  <div class="question-text">
                    <a class="glossarylink" href="glossary.html#agreement_description">Description of the Agreement or Transfer</a>:
                  </div>
                  <div class="question-options">
                    <div class="option">
                      <div class="option-input">
                        <input id="grantname" type="text" name="grantname" class="gather-text" maxlength="50" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="question-error">
                    Required Field
                  </div>
                  <br clear="both"/>
                </div>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- basic_info -->

            <div id="author_grant">
              <div class="screen-titlebar section4">
              <span class="screen-header">Who can terminate?</span>
              <span class="progress">Section 4</span>
              <br clear="both" />
              </div>
              <div>
                <div class="question">
                  <div class="question-text">
                    Did one or more of the <a class="glossarylink" href="glossary.html#author">authors or artists</a>
                    enter into the <a class="glossarylink" href="glossary.html#agreement">agreement or transfer</a>?
                  </div>
                  <div class="question-options">
                    <div class="option">
                      <div class="option-input">
                        <input type="radio" name="author_grant" value="Yes" />
                      </div>
                      <div class="option-text">Yes</div>
                    </div>
                    <div class="option">
                      <div class="option-input">
                        <input type="radio" name="author_grant" value="No" />
                      </div>
                      <div class="option-text">No</div>
                    </div>
                  </div>
                  <div class="question-error">
                    Please select Yes or No
                  </div>
                  <br clear="both"/>
                </div>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- author_grant -->

            <div id="author_grantors">
              <div class="screen-titlebar section4">
              <span class="screen-header">Who can terminate?</span>
              <span class="progress">Section 4</span>
              <br clear="both" />
              </div>
              <div>
                <div class="question">
                  Please check the box next to each <a class="glossarylink" href="glossary.html#author">author or artist</a>
                  who entered into the <a class="glossarylink" href="glossary.html#agreement">agreement or transfer</a>:
                  <span class="question-error">You must select at least one</span>
                </div>
                <div id="grantor_container"></div>
                <div class="invisible">
                  <div id="grantor-template" class="question">
                    <input type="checkbox" id="grantor-input" unchecked name="grantor" />
                    <span id="grantor-name">AUTHOR NAME</span>
                  </div>
                </div>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- author_grantors -->

            <div id="successor_grant">
              <div class="screen-titlebar section4">
              <span class="screen-header">Who can terminate?</span>
              <span class="progress">Section 4</span>
              <br clear="both" />
              </div>
              <div>
                <div class="question">
                  <div class="question-text">
                    Was the <a class="glossarylink" href="glossary.html#agreement">agreement or transfer</a>
                    made by a member of the <a class="glossarylink" href="glossary.html#author">author's or artist's</a>
                    family, or by the <a class="glossarylink" href="glossary.html#executors">executor</a> of the
                    author's or artist's estate?
                  </div>
                  <div class="question-options">
                    <div class="option">
                      <div class="option-input">
                        <input type="radio" name="successor_grant" value="Yes" />
                      </div>
                      <div class="option-text">Yes</div>
                    </div>
                    <div class="option">
                      <div class="option-input">
                        <input type="radio" name="successor_grant" value="No" />
                      </div>
                      <div class="option-text">No</div>
                    </div>
                  </div>
                  <div class="question-error">
                    Please select Yes or No
                  </div>
		  <div class="question">
		    For more information about which family members qualify, check out the
		    <a href="faq.php#I_am_not_the_original_author_or_artist.3B_can_I_still_take_advantage_of_the_termination_of_transfer_provisions.3F">FAQ</a>.
		  </div>
                  <br clear="both"/>
                </div>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- successor_grant -->

            <div id="successor_grantors">
              <div class="screen-titlebar section4">
              <span class="screen-header">Who can terminate?</span>
              <span class="progress">Section 4</span>
              <br clear="both" />
              </div>
              <div>
                <div class="question">
                  Please list each family member or <a class="glossarylink" href="glossary.html#executor">executor</a>
                  who signed the <a class="glossarylink" href="glossary.html#agreement">agreement or transfer</a>,
                  their relationship to the <a class="glossarylink" href="glossary.html#author">author or artist</a>,
                  and whether they are currently alive:
                </div>
                <div style="float:left; padding-left:25px; padding-right:10px; padding-top:5px;">
                  <a href="#" onclick="
                    // clone node
                    var new_node = $('successor1').cloneNode(true);
                    new_node.value = '';
                    // update node
                    var num = ($$('#successors_container input').length / 2) + 1;
                    new_node.id = new_node.id.replace(/1/, num);
                    var inputs = $A(new_node.getElementsByTagName('input'));
                    inputs.each(function(input){
                      input.name = input.name.replace(/1/, num);
                      input.id = input.id.replace(/1/, num);
                      input.value = '';
                    });
                    var new_err = $A(new_node.getElementsByTagName('div')).first();
                    new_err.id = new_err.id.replace(/1/, num);
                    Element.hide(new_err);
                    $('successor1').parentNode.appendChild(new_node);
                    return false;
                  ">[ + ]</a>
                  <a href="#" onclick="
                    var num = $$('#successors_container input').length / $$('#successor1 input').length;
                    if (num == 1) {
                      return false;
                    }
                    $('successors_container').removeChild($('successors_container').lastChild);
                    return false;
                  ">[ - ]</a>
                </div>
                <div style="float:left; padding-left:15px;">
                  <div id="successors_container">
                    <div>
                      <div class="successor_heading">Name:</div>
                      <div class="successor_heading">Relationship:</div>
                      <div class="successor_heading">Alive:</div>
                      <br clear="both"/>
                    </div>
                    <div id="successor1">
                      <input class="names" type="text" size="25" id="successor1_name" value="" name="successor1" />
                      <input class="names" type="text" size="25" id="successor1_rel" value="" name="successor1" />
                      Currently Alive: <input class="alive" type="checkbox" id="successor1_alive" name="successor1" />
                      <div class="question-error" id="successor1-error">Required Fields</div>
                      <br clear="both"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- successor_grantors -->

            <div id="author_alive">
              <div class="screen-titlebar section4">
              <span class="screen-header">Who can terminate?</span>
              <span class="progress">Section 4</span>
              <br clear="both" />
              </div>
              <div>
                <div class="question">
                  Now it is time to figure out who is able to terminate the
                  <a class="glossarylink" href="glossary.html#agreement">agreement or transfer</a>:
                </div>
                <div class="question">
                  <div class="question-text">Is <span id="author_alive-name">AUTHOR NAME</span> currently alive?</div>
                  <div class="question-options">
                    <div class="option">
                      <div class="option-input">
                        <input type="radio" value="Yes" unchecked name="author_alive" />
                      </div>
                      <div class="option-text">Yes</div>
                    </div>
                    <div class="option">
                      <div class="option-input">
                        <input type="radio" value="No" unchecked name="author_alive" />
                      </div>
                      <div class="option-text">No</div>
                    </div>
                  </div>
                  <div class="question-error">
                    Please Select Yes or No
                  </div>
                  <br clear="both"/>
                </div>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- author_alive -->

            <div id="author_spouse_info">
              <div class="screen-titlebar">
              <span class="screen-header">Who can terminate? - Family</span>
              <span class="progress">Section 4</span>
              <br clear="both" />
              </div>
              <div>
                <div class="question">
                  If the <a class="glossarylink" href="glossary.html#author">author or artist</a> is no longer living,
                  it may be that one of the author's or artist's family members is able to terminate the
                  <a class="glossarylink" href="glossary.html#agreement">agreement or transfer</a>.
                </div>
                <div id="q_spouse_none" class="question">
                  <div class="question-text">
                  <a id="spouse_yes" href="#spouse_yes">[ If <span id="author_spouse_info-name2">AUTHOR NAME</span>
                  was married, click here ]</a>
                  </div>
		  <div class="question-options">
		    <div class="option">
		      <div class="option-input">Never Married</div>
		    </div>
		  </div>
                </div>
                <div id="q_spouse_name" class="question">
                  <div class="question-text">
                    If <span id="author_spouse_info-name3">AUTHOR NAME</span> was married,
                    please enter the name of his or her spouse:<br>
                    <a id="spouse_no" href="#spouse_no">[ if <span id="author_spouse_info-name4">AUTHOR NAME</span>
                    was never married, click here ]</a>
                  </div>
                  <div class="question-options">
                    <div class="option">
                      <div class="option-input">
                        <input type="text" class="gather-text" maxlength="50" id="author_spouse_name" name="author_spouse_name" />
                      </div>
                    </div>
                  </div>
                  <div class="question-error">
                    Required Field
                  </div>
                  <br clear="both"/>
                </div>
                <div id="q_spouse_alive" class="question">
                  <div class="question-text">Is <span id="author_spouse_info-name1">AUTHOR NAME</span>'s Spouse currently alive?</div>
                  <div class="question-options">
                    <div class="option">
                      <div class="option-input">
                        <input type="radio" value="Yes" unchecked name="author_spouse_alive" />
                      </div>
                      <div class="option-text">Yes</div>
                    </div>
                    <div class="option">
                      <div class="option-input">
                        <input type="radio" value="No" unchecked name="author_spouse_alive" />
                      </div>
                      <div class="option-text">No</div>
                    </div>
                  </div>
                  <div class="question-error">Please Select Yes or No</div>
                  <br clear="both"/>
                </div>
                <div class="question">
                  <div class="question-text">
                    Please list all of the <a class="glossarylink" href="glossary.html#author">author's or artist's</a>
                    <a class="glossarylink" href="glossary.html#children">children</a>
                    and indicate whether they are currently alive:<br>
                    <a id="more_children">[ More ]</a>
                    <a id="less_children">[ Less ]</a>
		    <br>
                  </div>
                  <div class="question-options">
		    <div class="option"><div class="option-input"><span id="no_children">No Children</span></div></div>
                    <div id="childs_container"></div>
                    <div id="child_name" class="invisible">
		      <div class="option"><div class="option-input">
                      <span class="name_errors">Required Field</span>
                      <input class="gather-text" type="text" maxlength="50" value="" /><br>
                      Currently Alive: <input class="alive" type="checkbox" checked />
		      </div></div>
		      <br><br>
		      <br clear="both" />
                    </div>
                  </div>
                </div>
                <br clear="both"/>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
                <br clear="both"/>
              </div>
              <br clear="both"/>
            </div><!-- author_spouse_info -->

            <div id="author_grandchildren">
              <div class="screen-titlebar">
              <span class="screen-header">Who can terminate? - Grandchildren</span>
              <span class="progress">Section 4</span>
              <br clear="both" />
              </div>
              <div>
                <div class="question">
                  <div class="question-text">
                    We now need to determine if <span id="author_grandchildren-authorname1">AUTHOR NAME</span> had any grandchildren:
		  </div>
                </div>
                <div class="question">
                  <div class="question-text">
                    Please list all of <span id="author_grandchildren_name_span">[CHILD NAME]</span>'s
                    <a class="glossarylink" href="glossary.html#children">children</a>
                    (i.e., <span id="author_grandchildren-authorname2">AUTHOR NAME</span>'s grandchildren):<br>
                    <a id="more_grandchildren">[ More ]</a>
                    <a id="less_grandchildren">[ Less ]</a>
                  </div>
                  <div class="question-options">
                    <span id="no_grandchildren">None</span>
                    <div id="grandchildren_container"></div>
                  </div>
                  <br clear="both"/>
                </div>
              </div>
              <div class="continue">
                <button type="button" class="button-continue">Back</button>
                <button type="button" class="button-continue">Next</button>
              </div>
              <br clear="both"/>
            </div><!-- author_grandchildren -->

            <div id="submit">
              <div class="screen-titlebar">
              <span class="screen-header">Tool Completed</span>
              <span class="progress">Tool Completed</span>
              <br clear="both" />
              </div>
              <p>Thank you for using the Creative Commons Termination of Transfer Tool.  An information sheet should in PDF format momentarily.  Take this form to your legal counsel, or one of the participating clinics
                 for further assistance.</p>
            </div>

            <div id="error-scope_of_employment">
              <div class="screen-titlebar">
              <span class="screen-header">Termination Right Unlikely</span>
              <span class="progress">Tool Completed</span>
              <br clear="both" />
              </div>
              <h3>Work For Hire - Scope of Employment</h3>
              <p>
                If a copyrighted work was created within
                the scope of employment, then the rights in the work
                cannot be returned to the author under the
                termination of transfer provisions of US copyright law.
              </p>
              <p>
                Based on the information you have provided, it seems
                that you believe that the work was created within the
                scope of employment and thus, the work cannot have the rights
                returned to the author.  As a general rule, a work
                created by an employee within the scope of their employment
                is a "work for hire" and agreements and transfers in respect
                of "works for hire" cannot be terminated.
              </p>
              <p>
                Please note, however, that this tool is not definitive
                nor is it legal advice; so it may be that the work was
                not created in circumstances of employment and you may
                need to obtain some advice on the circumstances surrounding
                the creation of the creative work in question to see if
                you have a termination right.
              </p>
              <p><a href="termination.html">Click here to start over</a></p>
            </div>

            <div id="error-commissioned-pre1978">
              <div class="screen-titlebar">
              <span class="screen-header">Termination Right Unlikely</span>
              <span class="progress">Tool Completed</span>
              <br clear="both" />
              </div>
              <h3>Work For Hire - Commissioned Work Pre-1978</h3>
              <p>
                Based on the information you have provided, it does not
                appear that the rights can be returned to the author or artist.
                As a general rule, works that were created by special order
                or commission before January 1, 1978 are likely to be "works for hire"
                and agreements and transfers in relation to "works for hire"
                cannot be terminated.
              </p>
              <p>
                Please note, however, that this tool is not definitive
                nor is it legal advice; so it may be that the circumstances
                surrounding the creation of the work mean that the work
                is not a "work for hire" and you may need to obtain some
                advice on the circumstances surrounding the creation of
                the creative work in question to see if you have a
                termination right.
              </p>
              <p><a href="termination.html">Click here to start over</a></p>
            </div>

            <div id="error-commissioned-categoryA">
              <div class="screen-titlebar">
              <span class="screen-header">Termination Right Unlikely</span>
              <span class="progress">Tool Completed</span>
              <br clear="both" />
              </div>
              <h3>Work For Hire - Commissioned Work Post-1978 (Motion Pictures, etc)</h3>
              <p>
                Based on the information you have provided, it does not
                appear that the rights can be returned to the author or
                artist. As a general rule, works that were created by special
                order or commission after January 1, 1978 under the terms of
                a written agreement and that are a work that are part of a
                motion picture or other audiovisual work, a translation, a
                test, answer material for a test, an atlas, an instructional
                text, are "works for hire" and agreements and transfers in
                relation to "works for hire" are not capable of being
                terminated.
              </p>
              <p>
                Please note, however, that this tool is not definitive nor is
                it legal advice; so it may be that the circumstances
                surrounding the creation of the work mean that the work is
                not a "work for hire" and you may need to obtain some advice on
                the circumstances surrounding the creation of the creative
                work in question to see if you have a termination right.
              </p>
              <p><a href="termination.html">Click here to start over</a></p>
            </div>

            <div id="error-commissioned-categoryB">
              <div class="screen-titlebar">
              <span class="screen-header">Termination Right Unlikely</span>
              <span class="progress">Tool Completed</span>
              <br clear="both" />
              </div>
              <h3>Work For Hire - Commissioned Work Post-1978 (Collective Works, etc)</h3>
              <p>
                Based on the information you have provided, it does not
                appear that the rights can be returned to the author or
                artist. As a general rule, works that were created by special
                order or commission after January 1, 1978 under the terms of
                a written agreement and that are a work that either a
                compilation or a contribution to a collective work are works
                for hire and agreements and transfers in relation to works
                for hire are not capable of being terminated.
              </p>
              <p>
                Please note, however, that this tool is not definitive nor is
                it legal advice; so it may be that the circumstances
                surrounding the creation of the work mean that the work is
                not a "work for hire" and you may need to obtain some advice on
                the circumstances surrounding the creation of the creative
                work in question to see if you have a termination right.
              </p>
              <p><a href="termination.html">Click here to start over</a></p>
            </div>

            <div id="error-commissioned-categoryC">
              <div class="screen-titlebar">
              <span class="screen-header">Termination Right Unlikely</span>
              <span class="progress">Tool Completed</span>
              <br clear="both" />
              </div>
              <h3>Work For Hire - Commissioned Work Post-1978 (Supplementary Works)</h3>
              <p>
                Based on the information you have provided, it does not
                appear that the rights can be returned to the author or
                artist. As a general rule, works that were created by special
                order or commission after January 1, 1978 under the terms of
                a written agreement and that are a supplementary work are
                "works for hire" and agreements and transfers in relation to
                "works for hire" are not capable of being terminated.
              </p>
              <p>
                Please note, however, that this tool is not definitive nor is
                it legal advice; so it may be that the circumstances
                surrounding the creation of the work mean that the work is
                not a "work for hire" and you may need to obtain some advice on
                the circumstances surrounding the creation of the creative
                work in question to see if you have a termination right.
              </p>
              <p><a href="termination.html">Click here to start over</a></p>
            </div>

            <div id="error-after_window">
              <div class="screen-titlebar">
              <span class="screen-header">Termination Right Unlikely</span>
              <span class="progress">Tool Completed</span>
              <br clear="both" />
              </div>
              <h3>Notice Window Expired</h3>
              <p>
                Based on the information you have provided, it does not
                appear that a current right to terminate the agreement
                exists.
              </p>
              <p>
                Please note, however, that this tool is not definitive nor is
                it legal advice. You may need to obtain some advice on the
                circumstances surrounding the creation of the creative work
                in question to see if you have a current or future
                termination right.
              </p>
              <p><a href="termination.html">Click here to start over</a></p>
            </div>

            <div id="error-before_window">
              <div class="screen-titlebar">
              <span class="screen-header">Possible Future Termination Right</span>
              <span class="progress">Tool Completed</span>
              <br clear="both" />
              </div>
              <h3>Before Notice Window</h3>
              <p>
                Based on the information you have provided, it does not
                appear that a current right to terminate the agreement exists
                but one may arise in future beginning on
                <span id="error-before_window-notice_window_open">[date]</span>.
              </p>
              <p>
                Please note, however, that this tool is not definitive nor is
                it legal advice; so it may be that the information you input
                changes over time and/or that the circumstances surrounding
                the work's creation do not give rise to a right to terminate
                at a future date. You may need to obtain some advice on the
                circumstances surrounding the creation of the creative work
                in question to see if you have a termination right.
              </p>
              <p><a href="termination.html">Click here to start over</a></p>
            </div>

            <div id="error-invalid_grantor-203">
              <div class="screen-titlebar">
              <span class="screen-header">Termination Right Unlikely</span>
              <span class="progress">Tool Completed</span>
              <br clear="both" />
              </div>
              <h3>Post-1978 Agreement by Non-Author</h3>
              <p>
                Based on the information you have provided, it does not
                appear that any agreement or transfer entered into in
                relation to the work may be able to be terminated. As a
                general rule, only agreements and transfers entered into
                after January 1st, 1978 that are signed by the author(s) may
                be terminated. [MIA - TEXT REVIEW NEEDED]
              </p>
              <p>
                Please note, however, that this tool is not definitive nor is
                it legal advice; so it may be that the circumstances
                surrounding the execution of the agreement or transfer mean
                that it can be terminated. You may need to obtain some advice
                on the circumstances surrounding the signing of the agreement
                or transfer to see if termination is possible.
              </p>
              <p><a href="termination.html">Click here to start over</a></p>
            </div>

            <div id="error-invalid_grantor-304">
              <div class="screen-titlebar">
              <span class="screen-header">Termination Right Unlikely</span>
              <span class="progress">Tool Completed</span>
              <br clear="both" />
              </div>
              <h3>Pre-1978 Agreement by Non-Family Member</h3>
              <p>
                Based on the information you have provided, it does not
                appear that any agreement or transfer entered into in
                relation to the work may be able to be terminated. As a
                general rule, only agreements and transfers that are signed
                either by the author(s) or their widows, widowers, children,
                next of kin or executors may be terminated.
              </p>
              <p>
                Please note, however, that this tool is not definitive nor is
                it legal advice; so it may be that the circumstances
                surrounding the execution of the agreement or transfer mean
                that it can be terminated. You may need to obtain some advice
                on the circumstances surrounding the signing of the agreement
                or transfer to see if termination is possible.
              </p>
              <p><a href="termination.html">Click here to start over</a></p>
            </div>

            <div id="error-commonlaw-303-grant">
              <div class="screen-titlebar">
              <span class="screen-header">Termination Right Unlikely</span>
              <span class="progress">Tool Completed</span>
              <br clear="both" />
              </div>
              <h3>Common Law Copyright Grant (17 USC 303)</h3>
              <p>
                Based on the information you have provided, it does not
                appear that any agreement or transfer entered into in
                relation to the work may be able to be terminated.
              </p>
              <p>
                Please note, however, that this tool is not definitive nor is
                it legal advice; so it may be that the circumstances
                surrounding the execution of the agreement or transfer mean
                that it can be terminated. You may need to obtain some advice
                on the circumstances surrounding the signing of the agreement
                or transfer to see if termination is possible.
              </p>
              <p><a href="termination.html">Click here to start over</a></p>
            </div>

            <div id="error-publicdomain">
              <div class="screen-titlebar">
              <span class="screen-header">Termination Unnecessary</span>
              <span class="progress">Tool Completed</span>
              <br clear="both" />
              </div>
              <h3>Public Domain Work</h3>
              <p>
                Based on the information you have provided, it
                appears that the work is in the public domain.
              </p>
              <p>
                Please note, however, that this tool is not definitive nor is
                it legal advice.
              </p>
              <p><a href="termination.html">Click here to start over</a></p>
            </div>

          </div><!-- screens -->

        </form>
</div>

<? include_once "_footer.php"; ?>
