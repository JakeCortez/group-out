<?php
/**
* @author Charlie goodan (cgoodan@gmail.com)
*/

class Route {

    // PROPERTIES

    /**
     * primary key, integer, auto inserted upon creating a route
     */
    private $routeID;
    /**
     * FOREIGN KEY, originates from userID of current session
     */
    private $userID;
    /**
     * CURRENT_TIMESTAMP, auto inserted upon creating an event
     */
    private $routeDateCreated;
    /**
     * string, route enters text into field with character limit of 20
     */
    private $routeName;
    /**
     * string, route types text into a field with a character limit
     */
    private $routeDescription;
    /**
     * integer, 0=easy | 1=moderate | 3=hard | 4=expert
     */
    private $routeDifficulty;
    /**
     * integer, 0=public | 2=group | 3=private
     */
    private $routePrivacy;
    /**
     *provided by google maps api
     **/
    private $centerLng;
    /**
     *provided by google maps api
     **/
    private $centerLat


  /**
   * constructor for Route
   *
   * @ param $newRouteID FOREIGN KEY, integer, originates from Routes
   * @ param $newUserID FOREIGN KEY, integer, originates from userID of current session
   * @ param $newRouteDateCreated CURRENT_TIMESTAMP auto inserted upon creating an event
   * @ param $newRouteName string, user enters text into field with character limit
   * @ param $newRouteDescription string, user types text into a field with a character limit
   * @ param $newRouteDifficulty integer, 0=easy | 1=moderate | 3=hard | 4=expert
   * @ param $newRoutePrivacy integer, 0=public | 2=group | 3=private
   * @ param $newCenterLng double provided by google maps api
   * @ param $newCenterLat double provided by google maps api
   * @ throws UnexpectedValueException when a parameter is of the wrong type
   * @ throws RangeException when a parameter is invalid
   **/
   public function __construct($newRouteID, $newUserID, $newRouteDateCreated, $newRouteName, $newRouteDescription, $newRouteDifficulty, $newRoutePrivacy, $newCenterLng, $newCenterLat) {

      try {
        $this->setRouteID($newRouteID); // FOREIGN KEY
        $this->setUserID($newUserID); // FOREIGN KEY
        $this->setRouteDateCreated($newRouteDateCreated);
        $this->setRouteName($newRouteName);
        $this->setRouteDescription($newEventDescription);
        $this->setRouteDifficulty($newEventDifficulty);
        $this->setCenterLng($newCenterLng);
        $this->setCenterLng($newCenterLng);

      } catch(UnexpectedValueException $unexpectedValue) {
          // rethrow to the caller
          throw(new UnexpectedValueException("Unable to construct Route", 0, $unexpectedValue));
      } catch(RangeException $range) {
          // rethrow to the caller
          throw(new RangeException("Unable to construct Route", 0, $range));
      }
    }

    //// GET & SET FOR routeID !!FOREIGN KEY!!
  /**
   * gets the value of routeID
   *
   *@ return mixed routeID (or null if new object)
   */
    public function getRouteID() {
        return($this->routeID);
    }

    /**
     * sets the value of routeID
     *
     * @ param mixed $newRouteID routeID (or null if new object)
     * @ throws UnexpectedValueException if not an integer or null
     * @ throws RangeException if routeID isn't positive
     **/
    public function setRouteID($newRouteID) {
    // zeroth, set allow the routeID to be null if a new object
        if($newRouteID === null) {
            $this->routeID = null;
            return;
    }

    // first, ensure the routeID is an integer
    if(filter_var($newRouteID, FILTER_VALIDATE_INT) === false) {
        throw(new UnexpectedValueException("routeID $newRouteID is not numeric"));
    }

    // second, convert the routeID to an integer and enforce it's positive
    $newRouteID = intval($newRouteID);
    if($newRouteID <= 0) {
        throw(new RangeException("routeID $newRouteID is not positive"));
    }

    // finally, take the routeID out of quarantine and assign it
    $this->routeID = $newRouteID;
    }

///// GET & SET FOR userID !!FOREIGN KEY!!
    /**
     * gets the value of userID
     *
     * @ return mixed userID (or null if new object)
     **/
    public function getUserID() {
        return($this->userID);
    }

    /**
     * sets the value of userID
     *
     * @ param mixed $newUserID userID (or null if new object)
     * @ throws UnexpectedValueException if not an integer or null
     * @ throws RangeException if userID isn't positive
     **/
    public function setUserID($newUserID) {
        // zeroth, set allow the userID to be null if a new object
        if($newUserID === null) {
            $this->userID = null;
            return;
        }
    }

    // first, ensure the UserID is an integer
    if(filter_var($newUserID, FILTER_VALIDATE_INT) === false) {
        throw(new UnexpectedValueException("userID $newUserID is not numeric"));
    }

    // second, convert the userID to an integer and enforce it's positive
    $newUserID = intval($newUserID);
    if($newUserID <= 0) {
        throw(new RangeException("userID $newUserID is not positive"));
    }

    // finally, take the UserID out of quarantine and assign it
    $this->userID = $newUserID;
}

///// GET & SET FOR routeDateCreated
    /**
     * gets the value of routeDateCreated
     *
     * @ return DateTime routeDateCreated and time as a DateTime object
     * @ see http://php.net/manual/en/class.datetime.php
     **/
    public function getRouteDateCreated() {
        return($this->routeDateCreated);
    }

  /**
   * sets the value of routeDateCreated
   *
   * @ param mixed $newRouteDateCreated routeDateCreated as a string in Y-m-d H:i:s format or as a DateTime object
   * @ throws RangeException if the input is a string and cannot be parsed
   * @ see http://php.net/manual/en/function.date.php
   * @ see http://php.net/manual/en/class.datetime.php
   **/
  public function setRouteDateCreated($newRouteDateCreated) {
    // if null for new event
    if($newRouteDateCreated === null) {
      date_default_timezone_set("America/Denver");
      $currentDate = date("Y-m-d H:i:s");

      $this->routeDateCreated = $currentDate;
      return;
    }

    // zeroth, if this is a DateTime object, assign it
    if(gettype($newRouteDateCreated) === "object" && get_class($newRouteDateCreated) === "DateTime") {
        $this->routeDateCreated = $newRouteDateCreated;
        return;
    }

    // first, cleanse the date string
    $newRouteDateCreated = trim($newRouteDateCreated);
    $newRouteDateCreated = filter_var($newRouteDateCreated, FILTER_SANITIZE_STRING);

    // second, use a regular expression to extract the date and verify it
    if((preg_match("/^(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/", $newRouteDateCreated, $matches)) !== 1) {
        throw(new RangeException("routeDateCreated $newRouteDateCreated is not a mySQL formatted date"));
    }

    // third, verify the date is a valid date
    $year  = intval($matches[1]);
    $month = intval($matches[2]);
    $day   = intval($matches[3]);
    if((checkdate($month, $day, $year)) === false) {
        throw(new RangeException("routeDateCreated $newRouteDateCreated is not a Gregorian date"));
    }

    // finally, convert the date to a DateTime object
    if(($dateTime = DateTime::createFromFormat("Y-m-d H:i:s", $newRouteDateCreated)) === false) {
        throw(new RangeException("routeDateCreated $newRouteDateCreated cannot be converted to a DateTime object"));
    }
    $this->routeDateCreated = $dateTime;
  }

///// GET & SET FOR eventName
  /**
   * gets the value of eventName
   *
   * @ return string eventName
   **/
  public function getRouteName() {
      return($this->routeName);
  }

  /**
   * sets the value of routeName
   *
   * @ param string $newRouteName routeName
   **/

  public function setRouteName($newRouteName) {
      // filter the city as a generic string
      $newRouteName = trim($newRouteName);
      $newRouteName = filter_var($newRouteName, FILTER_SANITIZE_STRING);

      // then just take the city out of quarantine
      $this->routeName = $newRouteName;
  }

///// GET & SET FOR routeDescription
  /**
   * gets the value of routeDescription
   *
   * @ return string routeDescription
   **/
  public function getRouteDescription() {
      return($this->routeDescription);
  }

  /**
   * sets the value of routeDescription
   *
   * @ param string $newRouteDescription product name
   **/
  public function setRouteDescription($newRouteDescription) {
      // filter the description as a generic string
      $newRouteDescription = trim($newRouteDescription);
      $newRouteDescription = filter_var($newRouteDescription, FILTER_SANITIZE_STRING);

      // then just take the description out of quarantine
      $this->routeDescription = $newRouteDescription;
  }

///// GET & SET FOR routeDifficulty
  /**
   * gets the value of routeDifficulty
   *
   * @ return mixed routeDifficulty (or null if new object)
   **/
  public function getRouteDifficulty() {
      return($this->routeDifficulty);
  }

  /**
   * sets the value of routeDifficulty
   *
   * @param mixed $newRouteDifficulty routeDifficulty (or null if new object)
   * @throws UnexpectedValueException if not an integer or null
   * @throws RangeException if routeDifficulty isn't positive
   **/
  public function setRouteDifficulty($newRouteDifficulty) {
    // zeroth, set allow the routeDifficulty to be null if a new object
    if($newRouteDifficulty === null) {
        $this->routeDifficulty = null;
        return;
    }

    // first, ensure the routeDifficulty is an integer
    if(filter_var($newRouteDifficulty, FILTER_VALIDATE_INT) === false) {
        throw(new UnexpectedValueException("Route difficulty $newRouteDifficulty is not numeric"));
    }

    // second, convert the routeDifficulty to an integer and enforce it's positive
    $newRouteDifficulty = intval($newRouteDifficulty);
    if($newRouteDifficulty <= 0) {
        throw(new RangeException("Route difficulty $newRouteDifficulty is not positive"));
    }

    // finally, take the routeDifficulty out of quarantine and assign it
    $this->routeDifficulty = $newRouteDifficulty;
  }

///// GET & SET FOR routePrivacy
  /**
   * gets the value of routePrivacy
   *
   * @return mixed routePrivacy (or null if new object)
   **/
  public function getRoutePrivacy() {
      return($this->routePrivacy);
  }

  /**
   * sets the value of routePrivacy
   *
   * @param mixed $newRoutePrivacy routePrivacy (or null if new object)
   * @throws UnexpectedValueException if not an integer or null
   * @throws RangeException if routePrivacy isn't positive
   **/
  public function setRoutePrivacy($newRoutePrivacy) {
    // zeroth, set allow the routePrivacy to be null if a new object
    if($newRoutePrivacy === null) {
        $this->routePrivacy = null;
        return;
    }

    // first, ensure the routePrivacy is an integer
    if(filter_var($newRoutePrivacy, FILTER_VALIDATE_INT) === false) {
        throw(new UnexpectedValueException("Route privacy $newRoutePrivacy is not numeric"));
    }

    // second, convert the routePrivacy to an integer and enforce it's positive
    $newRoutePrivacy = intval($newRoutePrivacy);
    if($newRoutePrivacy <= 0) {
        throw(new RangeException("Route privacy $newRoutePrivacy is not positive"));
    }

    // finally, take the routePrivacy out of quarantine and assign it
    $this->routePrivacy = $newRoutePrivacy;
  }

    // trim() the input variable
    // use filter_var() with FILTER_VALIDATE_FLOAT
    // (float => OK, false => invalid)
    // Ermagherd! Kazim is AFK!
    // latitude: [-90, 90]
    // longitude: [-180, 180]
    // if it passes all that, take out of quarentine
    // Y U NO PRINT MORE MEMES!?!?!

    //accessor method for centerLng
    public function getCenterLng() {
        return($this->centerLng) ;
    }

    //mutator method for centerLng
    //@param float new value of latitude
    public function setCenterLat($newCenterLng) {
        if($newCenterLng === null) {
            $this->centerLng = null;
            return;
        }
    }
    $newCenterLng = trim($newCenterLng);

    if(filter_var($newCenterLng, FILTER_VALIDATE_FLOAT) === false) {
        throw(new UnexpectedValueException("provided longitude $newCenterLng is invalid"));
    }

    if($newCenterLng < -90) {
        throw(new RangeException("provided longitude $newCenterLng is invalid"));
    }

    if($newCenterLng > 90) {
        throw(new RangeException("provided longitude $newCenterLng is invalid"));
    }

     //finaly the centerLng is clean and can be taken out of quarentien
    $this->centerLng = $newCenterLng;

    //accessor method for centerLat
    public function getCenterLat() {
        return($this->centerLat) ;
    }

    //mutator method for centerLat
    //@param float new value of latitude
    public function setCenterLat($newCenterLat) {
        if($newCenterLat === null) {
            $this->centerLat = null;
            return;
        }
    }

    $newCenterLat = trim($newCenterLat);

    if(filter_var($newCenterLat, FILTER_VALIDATE_FLOAT) === false) {
        throw(new UnexpectedValueException("provided latitude $newCenterLat is invalid"));
    }

    if($newCenterLat < -180) {
        throw(new RangeException("provided latitude $newCenterLat is invalid"));
    }

    if($newCenterLat > 180) {
        throw(new RangeException("provided latitude $newCenterLat is invalid"));
    }

    //finaly the centerLat is clean and can be taken out of quarentien
    $this->centerLat = $newCenterLat;


/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////


///// METHOD TO INSERT EVENT INTO MYSQL
///// !! DOESN'T TAKE INTO ACCOUNT FOREIGN KEYS FOR routeID, UserID!!
  /**
   * inserts this Event to mysql
   *
   * @ param resource $mysqli pointer to mySQL connection, by reference
   * @ throws mysqli_sql_exception when mySQL related errors occur
   **/
  public static function selectRouteByRouteId(&$mysqli, $newRouteID) {
    // handle degenerate cases
    if(gettype($newRouteID) !== "string") {
     throw (new UnexpectedValueExceptioon("The id is not an integer"));
    }

    //trim whitespace
    $newRouteID = trim ($newRouteID);
    if($newRouteID === null) {
            $this->routeID = null;
            return;
    }

    if((filter_var($newRouteID, FILTER_VALIDATE_INT)) === false) {
            throw(new UnexpectedValueException("user id $newProfileId is not an integer"));
        }
        //third, convdert the user id to an integer and ensure it's positive
        $newRouteID =intval($newRouteID);
        if($newRouteID <=0) {
            throw(new RangeException("Please make sure that  $routeID is a positive number"));

        }

        if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli") {
        throw(new mysqli_sql_exception("input is not a mysqli object"));

    }

    // enforce the routeId is not null (i.e., don't update a resource that hasn't been inserted)

    if($this->routeID === null) {
        throw(new mysqli_sql_exception("Unable to update a routeID that does not exist"));

    }
    // create query template
    $query = "SELECT routeID, userID, routeDateCreated, routeName, routeDescription, routeDifficulty, routePrivacy, centerLng, centerLat FROM routes WHERE routeID = ?";

    $statement = $mysqli->prepare($query);

    if($statement === false) {

    throw(new mysqli_sql_exception("Unable to prepare statement"));

    }

    // bind the member variables to the place holders in the template

    $wasClean = $statement->bind_param("i", $this->routeID);

    if($wasClean === false) {

    throw(new mysqli_sql_exception("Unable to bind parameters"));

    }

    // execute the statement

    if($statement->execute() === false) {

    throw(new mysqli_sql_exception("Unable to execute mySQL statement"));

    }
  }
  public function insert(&$mysqli) {
    // create a database connection
        // create a sql statement
        //prepare sql statement
        //bind variables
        //insert sql statement
    // handle degenerate cases

    if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli") {

    throw(new mysqli_sql_exception("input is not a mysqli object"));

    }

    // enforce the resoureId is null (i.e., don't insert a resource that already exists)

    if($this->routeID !== null) {

    throw(new mysqli_sql_exception("not a new route Id"));

    }

    // create query template

    $query = "INSERT INTO routes(routeDateCreated, routeName, routeDescription, routeDifficulty, routePrivacy, centerLng, centerLat) VALUES( ?, ?, ?, ?, ?, ?, ?)";

    $statement = $mysqli->prepare($query);

    if($statement === false) {

    throw(new mysqli_sql_exception("Unable to prepare statement"));

    }
     // bind the member variables to the place holders in the template

    $wasClean = $statement->bind_param("sssssssibi", $this->rouetDateCreated, $this->routeName, $this->routeDescription, $this->routedifficulty, $this->routePrivacy, $this->centerLng, $this->centerLat);

    if($wasClean === false) {

    throw(new mysqli_sql_exception("Unable to bind parameters"));

    }

    // execute the statement
    if($statement->execute() === false) {
        throw(new mysqli_sql_exception("Unable to execute mySQL statement"));

    }

    // update the null resourceId with what mySQL just gave us
    $this->routeID = $mysqli->routeID;

    }
