document.addEventListener("DOMContentLoaded", () => {
    //console.log('Ready');

    const student_information = document.forms["student_information"];

    const name = student_information["name"];
    const nid = student_information["nid"];
    const dob = student_information["dob"];
    const gender = student_information["gender"];
    const phoneNumber = student_information["phoneNumber"];
    const email = student_information["email"];
    const uniID = student_information["uniID"];
    const cgpa = student_information["cgpa"];
    //const uniName = student_information["uniName"];
    //const bloodGroup = student_information["bloodGroup"];
    //const religion = student_information["religion"];
    //const department = student_information["department"];

    // var bg = document.getElementById("bloodGroup");
    // var rl = document.getElementById("religion");
    // var un = document.getElementById("uniName");
    // var dept = document.getElementById("department");

    const bg = document.getElementById("bloodGroup");
    const rl = document.getElementById("religion");
    const un = document.getElementById("uniName");
    const dept = document.getElementById("department");

    //console.log(name,nid,dob,gender,bloodGroup,religion,phoneNumber,email,uniName,uniID,cgpa,department);
    //console.log(typeof bloodGroup);
    //return;

    name.addEventListener("keyup", (e) => {
        // console.log(e.target.value);
        e.preventDefault();
        validate_name(e.target.value.trim());
    });

    nid.addEventListener("keyup", (e) => {
        // console.log(e.target.value);
        e.preventDefault();
        validate_nid(e.target.value.trim());
    });

    dob.addEventListener("change", (e) => {
        // console.log(e.target.value);
        e.preventDefault();
        validate_dob(e.target.value.trim());
    });

    gender.forEach((gender) => {
        // console.log(e);
        gender.addEventListener("change", (e) => {
            // console.log(e.target.value);
            e.preventDefault();
            validate_gender(e.target);
        });
    });

    phoneNumber.addEventListener("keyup", (e) => {
        // console.log(e.target.value);
        e.preventDefault();
        validate_phoneNumber(e.target.value.trim());
    });

    email.addEventListener("keyup", (e) => {
        // console.log(e.target.value);
        e.preventDefault();
        validate_email(e.target.value.trim());
    });

    uniID.addEventListener("keyup", (e) => {
        // console.log(e.target.value);
        e.preventDefault();
        validate_uniID(e.target.value.trim());
    });

    cgpa.addEventListener("keyup", (e) => {
        // console.log(e.target.value);
        e.preventDefault();
        validate_cgpa(e.target.value.trim(), cgpa.value.trim());
    });


    un.addEventListener("change", (e) => {
        // console.log(e.target.value);
        e.preventDefault();
        validate_uniName(e.target.value.trim());
    });

    dept.addEventListener("change", (e) => {
        // console.log(e.target.value);
        e.preventDefault();
        validate_department(e.target.value.trim());
    });



    bg.addEventListener("change", (e) => {
        console.log(e.target.value);
        e.preventDefault();
        validate_bloodGroup(e.target.value.trim());
    });

    rl.addEventListener("change", (e) => {
        // console.log(e.target.value);
        e.preventDefault();
        validate_religion(e.target.value.trim());
    });

    document.addEventListener("submit", (e) => {
        e.preventDefault();

        validate_name(name.value.trim());
        validate_email(email.value.trim());
        validate_nid(nid.value.trim());
        validate_phoneNumber(phoneNumber.value.trim());

        //var bg = document.getElementById("bloodGroup");
        if (bg.value == "") {
            validate_bloodGroup(bg);
        }

        validate_gender(gender[0]);
        validate_gender(gender[1]);
        validate_gender(gender[2]);


        //var rl = document.getElementById("religion");
        if (rl.value == "") {
            validate_religion(rl);
        }

        validate_dob(dob.value.trim());

        //var un = document.getElementById("uniName");
        if (un.value == "") {
            validate_uniName(un);
        }

        validate_uniID(uniID.value.trim());
        validate_cgpa(cgpa.value.trim());

        //var dept = document.getElementById("department");
        if (dept.value == "") {
            validate_department(dept);
        }


        if (
            validate_name(name.value.trim()) &&
            validate_email(email.value.trim()) &&
            validate_nid(nid.value.trim()) &&
            validate_phoneNumber(phoneNumber.value.trim()) &&
            (validate_gender(gender[0]) ||
                validate_gender(gender[1]) ||
                validate_gender(gender[2])) &&
            validate_religion(rl) &&
            validate_bloodGroup(bg) &&
            validate_dob(dob.value.trim()) &&
            validate_cgpa(cgpa.value.trim()) &&
            validate_uniName(un) &&
            validate_department(dept) &&
            validate_uniID(uniID.value.trim())
        ) {
            e.target.submit();
            alert("Submission Successful");
        }
    });
});

const validate_name = (name) => {
    const errorName = document.getElementById("errorName");

    if (name.length === 0) {
        errorName.innerText = "Name is required";
    } else if (name.length < 2) {
        errorName.innerText = "Invalid Name";
    } else if (!name.match(/^[a-zA-Z-.]/g)) {
        errorName.innerText = "Invalid Name";
    } else {
        errorName.innerText = "";
        return true;
    }

    return false;
};

const validate_nid = (nid) => {
    const errorNID = document.getElementById("errorNID");

    if (nid.length === 0) {
        errorNID.innerText = "NID is required";
    } else if (!nid.match(/^(?!0)(([0-9]{10,13}))$/g)) {
        errorNID.innerText = "Invalid NID";
    } else {
        errorNID.innerText = "";
        return true;
    }

    return false;
};

const validate_email = (email) => {
    const errorEmail = document.getElementById("errorEmail");

    if (email.length === 0) {
        errorEmail.innerText = "Email is required";
    } else if (
        !email.match(
            /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+(?:\.[a-zA-Z0-9-]+)*$/g
        )
    ) {
        errorEmail.innerText = "Invalid Email";
    } else {
        errorEmail.innerText = "";
        return true;
    }

    return false;
};

const validate_phoneNumber = (phoneNumber) => {
    const errorphoneNumber = document.getElementById("errorphoneNumber");

    if (phoneNumber.length === 0) {
        errorphoneNumber.innerText = "Phone Number is required";
    } else if (!phoneNumber.match(/^(((\+8801)|(01))[3-9]\d{1}[0-9]\d{6})$/g)) {
        errorphoneNumber.innerText = "Invalid Phone Number";
    } else {
        errorphoneNumber.innerText = "";
        return true;
    }

    return false;
};

const validate_gender = (gender) => {
    const errorGender = document.getElementById("errorGender");

    if (!gender.checked) {
        errorGender.innerText = "Gender is required";
    } else if (!gender.value.trim().match(/(male|female|other)/g)) {
        errorGender.innerText = "Gender is not valid";
    } else {
        errorGender.innerText = "";
        return true;
    }

    return false;
};

const validate_dob = (dob) => {
    const errorDOB = document.getElementById("errorDOB");

    if (dob.length === 0) {
        errorDOB.innerText = "Date of birth is required";
    } /*else if (!dob.match(/^\d{4}-\d{2}-\d{2}$/g)) {
        errorDOB.innerText = "Invalid Date of Birth";
    }*/ else {
        errorDOB.innerText = "";
        return true;
    }

    return false;
};

const validate_bloodGroup = (bg) => {
    const errorBloodGroup = document.getElementById("errorbloodGroup");

    //var bg = document.getElementById("bloodGroup");
    if (bg.value == "") {
        errorBloodGroup.innerText = "Blood Group is required";
    }
    else
    {
        errorBloodGroup.innerText = "";
        return true;
    }


    return false;
};
const validate_religion = (rl) => {
    const errorReligion = document.getElementById("errorReligion");

    if (rl.value == "") {
        errorReligion.innerText = "Religion is required";
    }
    else
    {
        errorReligion.innerText = "";
        return true;
    }

    return false;
};

const validate_uniName = (un) => {
    const errorUniName = document.getElementById("errorUniName");

    if (un.value == "") {
        errorUniName.innerText = "University Name is required";
    }
    else
    {
        errorUniName.innerText = "";
        return true;
    }

    return false;
};

const validate_uniID = (uniID) => {
    const errorUniID = document.getElementById("errorUniID");

    if (uniID.length === 0) {
        errorUniID.innerText = "University ID is required";
    } else if (!uniID.match(/^\d{2}-\d{5}-[1-3]\d{0}$/g)) {
        errorUniID.innerText = "Invalid University ID";
    } else {
        errorUniID.innerText = "";
        return true;
    }

    return false;
};

const validate_cgpa = (cgpa) => {
    const errorCgpa = document.getElementById("errorCgpa");

    if (cgpa.length === 0) {
        errorCgpa.innerText = "CGPA is required";
    } else if (!(0.0 <= cgpa && cgpa <= 4.0)) {
        errorCgpa.innerText = "Invalid CGPA";
    } else {
        errorCgpa.innerText = "";
        return true;
    }

    return false;
};

const validate_department = (dept) => {
    const errorDepartment = document.getElementById("errorDepartment");

    if (dept.value == "") {
        errorDepartment.innerText = "Department is required";
    }
    else
    {
        errorDepartment.innerText = "";
        return true;
    }

    return false;
};
