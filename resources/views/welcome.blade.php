<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HRIA Scholar Talent Network Form</title>
  <style>
    :root {
      --bg: #f7f1e8;
      --card: #fffaf2;
      --text: #1f2933;
      --muted: #667085;
      --primary: #7a4f22;
      --primary-dark: #5f3b17;
      --border: #e4d6c4;
      --focus: #b7791f;
      --success: #1f7a4f;
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #f7f1e8 0%, #efe0cc 100%);
      color: var(--text);
      line-height: 1.5;
      padding: 32px 16px;
    }

    .container {
      max-width: 920px;
      margin: 0 auto;
    }

    .header {
      text-align: center;
      margin-bottom: 28px;
    }

    .badge {
      display: inline-block;
      padding: 8px 14px;
      border: 1px solid var(--border);
      border-radius: 999px;
      color: var(--primary);
      background: rgba(255, 250, 242, 0.7);
      font-size: 13px;
      font-weight: 700;
      letter-spacing: 0.3px;
      margin-bottom: 14px;
    }

    h1 {
      margin: 0 0 12px;
      font-size: 34px;
      line-height: 1.15;
      color: #23180e;
    }

    .purpose {
      max-width: 760px;
      margin: 0 auto;
      color: var(--muted);
      font-size: 16px;
    }

    form {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 22px;
      padding: 28px;
      box-shadow: 0 18px 50px rgba(72, 45, 17, 0.12);
    }

    .section-title {
      margin: 28px 0 14px;
      padding-bottom: 8px;
      border-bottom: 1px solid var(--border);
      color: var(--primary-dark);
      font-size: 18px;
      font-weight: 800;
    }

    .section-title:first-child {
      margin-top: 0;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 18px;
    }

    .field {
      display: flex;
      flex-direction: column;
      gap: 7px;
    }

    .field.full {
      grid-column: 1 / -1;
    }

    label {
      font-weight: 700;
      font-size: 14px;
      color: #2d2418;
    }

    .hint {
      color: var(--muted);
      font-size: 13px;
      margin-top: -2px;
    }

    input,
    select,
    textarea {
      width: 100%;
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 12px 13px;
      font-size: 15px;
      background: #ffffff;
      color: var(--text);
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
    }

    input:focus,
    select:focus,
    textarea:focus {
      border-color: var(--focus);
      box-shadow: 0 0 0 4px rgba(183, 121, 31, 0.12);
    }

    textarea {
      min-height: 110px;
      resize: vertical;
    }

    .checkbox-grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 10px;
      margin-top: 4px;
    }

    .checkbox-card,
    .radio-card {
      display: flex;
      gap: 8px;
      align-items: flex-start;
      border: 1px solid var(--border);
      background: #fff;
      border-radius: 12px;
      padding: 10px;
      font-size: 14px;
      cursor: pointer;
    }

    .checkbox-card input,
    .radio-card input {
      width: auto;
      margin-top: 3px;
    }

    .radio-stack {
      display: grid;
      gap: 10px;
      margin-top: 4px;
    }

    .actions {
      display: flex;
      gap: 12px;
      align-items: center;
      justify-content: flex-end;
      margin-top: 28px;
      flex-wrap: wrap;
    }

    button {
      border: 0;
      border-radius: 999px;
      padding: 13px 22px;
      font-size: 15px;
      font-weight: 800;
      cursor: pointer;
    }

    .btn-secondary {
      background: #f1e5d5;
      color: var(--primary-dark);
    }

    .btn-primary {
      background: var(--primary);
      color: #fff;
      box-shadow: 0 10px 25px rgba(122, 79, 34, 0.25);
    }

    .message {
      display: none;
      margin-top: 18px;
      padding: 14px 16px;
      border-radius: 14px;
      background: #ecfdf3;
      border: 1px solid #b7ebc6;
      color: var(--success);
      font-weight: 700;
    }

    .required {
      color: #b42318;
    }

    @media (max-width: 760px) {
      body {
        padding: 20px 12px;
      }

      h1 {
        font-size: 26px;
      }

      form {
        padding: 20px;
      }

      .grid,
      .checkbox-grid {
        grid-template-columns: 1fr;
      }

      .actions {
        justify-content: stretch;
      }

      button {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <main class="container">
    @auth
    <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
      <a href="/admin/report" class="badge" style="text-decoration: none; background: var(--primary); color: white; padding: 10px 20px;">
          Go to Admin Reports &rarr;
      </a>
  </div>
  @endauth
    <header class="header">
      <div class="badge">HRIA / HRSO</div>
      <h1>HRIA Scholar Talent Network Form</h1>
      <p class="purpose">
        This form is for serious current and former HRIA students who are willing to contribute their skills, experience, time, or professional network to support HRIA and HRSO’s future goals.
      </p>
    </header>

    <form id="talentForm" enctype="multipart/form-data">
      @csrf <div class="section-title">Personal Information</div>
      <div class="grid">
        <div class="field">
          <label for="fullName">Full Name as per CNIC <span class="required">*</span></label>
          <input id="fullName" name="full_name" type="text" required placeholder="Enter your full legal name" />
        </div>

        <div class="field">
          <label for="fatherName">Father's Name <span class="required">*</span></label>
          <input id="fatherName" name="father_name" type="text" required placeholder="Enter father's name" />
        </div>

        <div class="field">
          <label for="city">City <span class="required">*</span></label>
          <input id="city" name="city" type="text" required placeholder="Example: Lahore" />
        </div>

        <div class="field">
          <label for="whatsapp">Working WhatsApp Number <span class="required">*</span></label>
          <input id="whatsapp" name="whatsapp" type="tel" required placeholder="Example: 03XX-XXXXXXX" />
        </div>

        <div class="field full">
          <label for="address">Complete Address <span class="required">*</span></label>
          <textarea id="address" name="address" required placeholder="Enter your current residential address" style="min-height: 80px;"></textarea>
        </div>

        <div class="field">
          <label for="photo">Latest Photo</label>
          <input id="photo" name="photo" type="file" accept="image/*" />
        </div>
      </div>

      <div class="section-title">Academic & Professional Details</div>
      <div class="grid">
        <div class="field">
          <label for="status">Current Status <span class="required">*</span></label>
          <select id="status" name="status" required>
            <option value="">Select current status</option>
            <option value="Student">Student</option>
            <option value="Employed">Employed</option>
            <option value="Business Owner">Business Owner</option>
            <option value="Freelancer">Freelancer</option>
            <option value="Other">Other</option>
          </select>
        </div>

        <div class="field">
          <label for="qualification">Highest Academic Qualification <span class="required">*</span></label>
          <input id="qualification" name="qualification" type="text" required placeholder="Example: BS Computer Science" />
        </div>

        <div class="field">
          <label for="batch">Passing Year (Batch) <span class="required">*</span></label>
          <input id="batch" name="batch" type="number" min="1970" max="2099" required placeholder="Example: 2025" />
        </div>

        <div class="field">
          <label for="jobRole">Current Job Role / Business Field</label>
          <input id="jobRole" name="job_role" type="text" placeholder="Example: Teacher, Software Developer, Entrepreneur" />
        </div>

        <div class="field">
          <label for="company">Company / Business Name</label>
          <input id="company" name="company" type="text" placeholder="Enter organization or business name" />
        </div>

        <div class="field full">
          <label for="skills">Top Skills / Certifications</label>
          <p class="hint">Mention your strongest skills, technical abilities, professional certifications, or special expertise.</p>
          <textarea id="skills" name="skills" required placeholder="Example: Graphic design, teaching, digital marketing, Python, public speaking, leadership..."></textarea>
        </div>

        <div class="field full">
          <label for="achievement">Major Achievement</label>
          <p class="hint">Academic, professional, business, leadership, or social contribution.</p>
          <textarea id="achievement" name="achievement" required placeholder="Briefly describe one major achievement that shows your capability."></textarea>
        </div>
      </div>

      <div class="section-title">Contribution & Availability</div>
      <div class="grid">
        <div class="field full">
          <label>How can you contribute to HRIA/HRSO? <span class="required">*</span></label>
          <div class="checkbox-grid">
            <label class="checkbox-card"><input type="checkbox" name="contributions[]" value="Teaching" /> Teaching</label>
            <label class="checkbox-card"><input type="checkbox" name="contributions[]" value="Mentorship" /> Mentorship</label>
            <label class="checkbox-card"><input type="checkbox" name="contributions[]" value="Career Guidance" /> Career Guidance</label>
            <label class="checkbox-card"><input type="checkbox" name="contributions[]" value="Admissions Campaign" /> Admissions Campaign</label>
            <label class="checkbox-card"><input type="checkbox" name="contributions[]" value="Social Media" /> Social Media</label>
            <label class="checkbox-card"><input type="checkbox" name="contributions[]" value="Fundraising" /> Fundraising</label>
            <label class="checkbox-card"><input type="checkbox" name="contributions[]" value="Events" /> Events</label>
            <label class="checkbox-card"><input type="checkbox" name="contributions[]" value="IT Support" /> IT Support</label>
            <label class="checkbox-card"><input type="checkbox" name="contributions[]" value="Business Networking" /> Business Networking</label>
            <label class="checkbox-card"><input type="checkbox" name="contributions[]" value="Volunteer Work" /> Volunteer Work</label>
            <label class="checkbox-card"><input type="checkbox" name="contributions[]" value="Other" /> Other</label>
          </div>
        </div>

        <div class="field">
          <label for="availability">Availability to Support <span class="required">*</span></label>
          <select id="availability" name="availability" required>
            <option value="">Select availability</option>
            <option value="Weekly">Weekly</option>
            <option value="Monthly">Monthly</option>
            <option value="Only for Events">Only for Events</option>
            <option value="Online Only">Online Only</option>
            <option value="In Person">In Person</option>
            <option value="As Needed">As Needed</option>
          </select>
        </div>

        <div class="field full">
          <label>Are you serious about actively contributing to HRIA/HRSO? <span class="required">*</span></label>
          <div class="radio-stack">
            <label class="radio-card"><input type="radio" name="seriousness" value="Yes, I am ready to contribute actively" required /> Yes, I am ready to contribute actively</label>
            <label class="radio-card"><input type="radio" name="seriousness" value="Maybe, depending on the opportunity" /> Maybe, depending on the opportunity</label>
            <label class="radio-card"><input type="radio" name="seriousness" value="No, only want to stay connected" /> No, only want to stay connected</label>
          </div>
        </div>

        <div class="field full">
          <label for="suggestions">Your suggestions to improve HRIA</label>
          <textarea id="suggestions" name="suggestions" placeholder="Share practical suggestions, ideas, or improvements."></textarea>
        </div>
      </div>

      <div class="actions">
        <button class="btn-secondary" type="reset">Clear Form</button>
        <button class="btn-primary" type="submit" id="submitBtn">Submit Registration</button>
      </div>

      <div class="message" id="successMessage">
        Thank you. Your HRIA Scholar Talent Network form has been submitted successfully.
      </div>
      
      <div class="message" id="errorMessage" style="background: #fef3f2; border-color: #fecdca; color: #b42318; display: none;">
        There was an error submitting your form. Please check the fields and try again.
      </div>
    </form>
  </main>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  
  <script>
    $(document).ready(function() {
        $('#talentForm').on('submit', function(e) {
            e.preventDefault();

            const checkedContributions = $('input[name="contributions[]"]:checked');
            if (checkedContributions.length === 0) {
                alert('Please select at least one contribution area.');
                return;
            }

            var form = $(this)[0];
            var formData = new FormData(form);
            var submitBtn = $('#submitBtn');

            submitBtn.prop('disabled', true).text('Submitting...');
            
            $('#successMessage').hide();
            $('#errorMessage').hide();

            $.ajax({
                url: '/submit-form',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#successMessage').show();
                    $('#successMessage')[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                    
                    form.reset();
                    
                    submitBtn.prop('disabled', false).text('Submit Registration');
                },
                error: function(xhr) {
                    $('#errorMessage').show();
                    
                    submitBtn.prop('disabled', false).text('Submit Registration');
                    
                    if (xhr.status === 422) {
                        console.log("Validation Errors:", xhr.responseJSON.errors);
                    } else {
                        console.log("Server Error:", xhr.responseText);
                    }
                }
            });
        });
    });
  </script>
</body>
</html>