<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Information</title>

    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
        }

        td[id*="error"],
        span[id*="error"] {
            color: red;
        }

        legend {
            text-align: center;
        }
    </style>
</head>

<body>
    <form id="student_information" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            <legend>Student Information</legend>
            <table class="center">
                <tr>
                    <td><label for="name">Name</label></td>
                    <td>:<input type="text" name="name" id="name"></td>
                    <td><span id="errorName"></td>
                </tr>
                <tr>
                    <td><label for="nid">NID Card No</label></td>
                    <td>:<input type="text" name="nid" id="nid"></td>
                    <td><span id="errorNID"></td>
                </tr>
                <tr>
                    <td><label for="dob">Date of Birth</label></td>
                    <td>:<input type="date" name="dob" id="dob"></td>
                    <td><span id="errorDOB"></td>
                </tr>
                <tr>
                    <td><label for="gender">Gender</label></td>
                    <td>:<input type="radio" name="gender" value="male" id="male"><label for="male">Male</label>
                        <input type="radio" name="gender" value="female" id="female"><label for="female">Female</label>
                        <input type="radio" name="gender" value="other" id="other"><label for="other">Other</label>
                    </td>
                    <td><span id="errorGender"></span></td>
                </tr>
                <tr>
                    <td><label for="bloodGroup">Blood Group</label></td>
                    <td>:<select name="bloodGroup" id="bloodGroup">
                            <option value="">Please Select</option>
                            <option value="o_pos">O+</option>
                            <option value="o_neg">O-</option>
                            <option value="a_pos">A+</option>
                            <option value="a_neg">A-</option>
                            <option value="b_pos">B+</option>
                            <option value="b_neg">B-</option>
                            <option value="ab_pos">AB+</option>
                            <option value="ab_neg">AB-</option>
                        </select>
                    </td>
                    <td><span id="errorbloodGroup"></span></td>
                </tr>
                <tr>
                    <td><label for="religion">Religion</label></td>
                    <td>:<select name="religion" id="religion">
                            <option value="">Please Select</option>
                            <option value="islam">Islam</option>
                            <option value="hindu">Hindu</option>
                            <option value="christian">Christian</option>
                            <option value="buddha">Buddha</option>
                            <option value="other">Other</option>
                        </select>
                    </td>
                    <td><span id="errorReligion"></span></td>
                </tr>
                <tr>
                    <td><label for="phoneNumber">Phone Number</label></td>
                    <td>:<input type="text" name="phoneNumber" id="phoneNumber"></td>
                    <td><span id="errorphoneNumber"></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td>:<input type="text" name="email" id="email"></td>
                    <td><span id="errorEmail"></td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>University Information</legend>
            <table class="center">
                <tr>
                    <td><label for="uniName">University Name</label></td>
                    <td>:<select name="uniName" id="uniName">
                            <option value="">Please Select</option>
                            <option value="aiub">American International University - Bangladesh</option>
                        </select></td>
                    <td><span id="errorUniName"></td>
                </tr>
                <tr>
                    <td><label for="uniID">University ID</label></td>
                    <td>:<input type="text" name="uniID" id="uniID"></td>
                    <td><span id="errorUniID"></td>
                </tr>
                <tr>
                    <td><label for="cgpa">CGPA</label></td>
                    <td>:<input type="text" name="cgpa" id="cgpa"></td>
                    <td><span id="errorCgpa"></td>
                </tr>
                <tr>
                    <td><label for="department">Department</label></td>
                    <td>:<select name="department" id="department">
                            <option value="">Please Select</option>
                            <option value="cse">Computer Science & Engineering</option>
                            <option value="eee">Electrical and Electronic Engineering</option>
                            <option value="bba">Bachelor of Business Administration</option>
                            <option value="llb">Bachelor of Laws</option>
                        </select>
                    </td>
                    <td><span id="errorDepartment"></span></td>
                </tr>
            </table>
        </fieldset>
        <table class="center">
            <tr>
                <td><input type="submit" name="submit_btn" id="submit_btn" value="Submit"></td>
                <td><input type="reset" id="reset"></td>
            </tr>
        </table>
    </form>
    <script src="validation.js"></script>
</body>

</html>