<?php
/**
 *
 * ThinkUp/tests/all_plugin_tests.php
 *
 * Copyright (c) 2009-2016 Gina Trapani
 *
 * LICENSE:
 *
 * This file is part of ThinkUp (http://thinkup.com).
 *
 * ThinkUp is free software: you can redistribute it and/or modify it under the terms of the GNU General Public
 * License as published by the Free Software Foundation, either version 2 of the License, or (at your option) any
 * later version.
 *
 * ThinkUp is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with ThinkUp.  If not, see
 * <http://www.gnu.org/licenses/>.
 *
 *
 * @author Gina Trapani <ginatrapani[at]gmail[dot]com>
 * @license http://www.gnu.org/licenses/gpl.html
 * @copyright 2009-2016 Gina Trapani
 */
include 'init.tests.php';
require_once THINKUP_WEBAPP_PATH.'_lib/extlib/simpletest/autorun.php';
require_once THINKUP_WEBAPP_PATH.'_lib/extlib/simpletest/web_tester.php';
require_once THINKUP_WEBAPP_PATH.'_lib/extlib/simpletest/mock_objects.php';

$RUNNING_ALL_TESTS = true;
$version = explode('.', PHP_VERSION); //dont run redis test for php less than 5.3
$plugin_tests = new TestSuite('Plugin tests');
$plugin_tests->add(new TestOfExpandURLsPlugin());
$plugin_tests->add(new TestOfExpandURLsPluginConfigurationController());
$plugin_tests->add(new TestOfFlickrAPIAccessor());
$plugin_tests->add(new TestOfFacebookCrawler());
$plugin_tests->add(new TestOfFacebookPlugin());
$plugin_tests->add(new TestOfFacebookInstanceMySQLDAO());
$plugin_tests->add(new TestOfFacebookPluginConfigurationController());
$plugin_tests->add(new TestOfTwitterAPIAccessorOAuth());
$plugin_tests->add(new TestOfTwitterAPIEndpoint());
$plugin_tests->add(new TestOfTwitterCrawler());
$plugin_tests->add(new TestOfTwitterInstanceMySQLDAO());
$plugin_tests->add(new TestOfTwitterPlugin());
$plugin_tests->add(new TestOfTwitterPluginConfigurationController());
$plugin_tests->add(new TestOfTwitterPluginHashtagConfigurationController());
$plugin_tests->add(new TestOfCrawlerTwitterAPIAccessorOAuth());
$plugin_tests->add(new TestOfRetweetDetector());
$plugin_tests->add(new TestOfHelloThinkUpPluginConfigurationController());
$plugin_tests->add(new TestOfHelloThinkUpPlugin());
$plugin_tests->add(new TestOfSmartyModifierLinkUsernames());
$plugin_tests->add(new TestOfInstagramPlugin());
$plugin_tests->add(new TestOfInstagramInstanceMySQLDAO());
$plugin_tests->add(new TestOfInstagramCrawler());
$plugin_tests->add(new TestOfInstagramPluginConfigurationController());
$plugin_tests->add(new TestOfInsightPluginParent());
$plugin_tests->add(new TestOfInsightsGeneratorPluginConfigurationController());
$plugin_tests->add(new TestOfInsightsGeneratorPlugin());
//Insights
$plugin_tests->add(new TestOfAllAboutYouInsight());
$plugin_tests->add(new TestOfBigReshareInsight());
$plugin_tests->add(new TestOfBiggestFansInsight());
$plugin_tests->add(new TestOfClickSpikeInsight());
$plugin_tests->add(new TestOfFrequencyInsight());
//$plugin_tests->add(new TestOfGenderAnalysisInsight());
$plugin_tests->add(new TestOfListMembershipInsight());
$plugin_tests->add(new TestOfSavedSearchResultsInsight());
$plugin_tests->add(new TestOfStyleStatsInsight());
$plugin_tests->add(new TestOfMetweetInsight());
//$plugin_tests->add(new TestOfInteractionsInsight());
$plugin_tests->add(new TestOfWeeklyBestsInsight());
$plugin_tests->add(new TestOfResponseTimeInsight());
$plugin_tests->add(new TestOfFavoritedLinksInsight());
$plugin_tests->add(new TestOfFavoriteFlashbacksInsight());
$plugin_tests->add(new TestOfLongLostContactsInsight());
$plugin_tests->add(new TestOfLinkPromptInsight());
$plugin_tests->add(new TestOfOutreachPunchcardInsight());
$plugin_tests->add(new TestOfSplitOpinionsInsight());
$plugin_tests->add(new TestOfViewDurationInsight());
$plugin_tests->add(new TestOfLikeSpikeInsight());
$plugin_tests->add(new TestOfViewSpikeInsight());
$plugin_tests->add(new TestOfSubscriberChangeInsight());
$plugin_tests->add(new TestOfMinutesViewedInsight());
$plugin_tests->add(new TestOfBiggestFansInsight());
$plugin_tests->add(new TestOfFlashbackInsight());
$plugin_tests->add(new TestOfFollowerCountHistoryInsight());
$plugin_tests->add(new TestOfWeeklyGraphInsight());
$plugin_tests->add(new TestOfInterestingFollowersInsight());
$plugin_tests->add(new TestOfThanksCountInsight());
$plugin_tests->add(new TestOfLOLCountInsight());
//$plugin_tests->add(new TestOfFBombCountInsight());
$plugin_tests->add(new TestOfActivitySpikeInsight());
$plugin_tests->add(new TestOfFollowCountVisualizerInsight());
$plugin_tests->add(new TestOfCongratsCountInsight());
$plugin_tests->add(new TestOfTimeSpentInsight());
$plugin_tests->add(new TestOfTwitterAgeInsight());
$plugin_tests->add(new TestOfTwitterBirthdayInsight());
$plugin_tests->add(new TestOfPhotoPromptInsight());
$plugin_tests->add(new TestOfExclamationCountInsight());
$plugin_tests->add(new TestOfMetaPostsCountInsight());
$plugin_tests->add(new TestOfFacebookProfilePromptInsight());
$plugin_tests->add(new TestOfLocationAwarenessInsight());
$plugin_tests->add(new TestOfBioTrackerInsight());
$plugin_tests->add(new TestOfNewDictionaryWordsInsight());
$plugin_tests->add(new TestOfFollowerComparisonInsight());
$plugin_tests->add(new TestOfDiversifyLinksInsight());
//$plugin_tests->add(new TestOfAgeAnalysisInsight());
$plugin_tests->add(new TestOfTopWordsInsight());
$plugin_tests->add(new TestOfBestieInsight());
// Don't run the developer insight test every time
// $plugin_tests->add(new TestOfHelloThinkUpInsight());


$tr = new TextReporter();
$start =  ((float)$usec + (float)$sec);
$plugin_tests->run( $tr );

if (getenv("TEST_TIMING")=="1") {
    list($usec, $sec) = explode(" ", microtime());
    $finish =  ((float)$usec + (float)$sec);
    $runtime = round($finish - $start);
    printf("Tests completed run in $runtime seconds\n");
}

if (isset($RUNNING_ALL_TESTS) && $RUNNING_ALL_TESTS) {
    if (isset($TOTAL_PASSES) && isset($TOTAL_FAILURES)) {
        $TOTAL_PASSES = $TOTAL_PASSES + $tr->getPassCount();
        $TOTAL_FAILURES = $TOTAL_FAILURES + $tr->getFailCount();
    }
}
