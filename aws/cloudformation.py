# ==================================================
# This stack creates the API infrastructure.
# ==================================================
from troposphere import Template, Parameter, Ref, Join
import troposphere.iam as iam

# ==================================================
# Template details.
# ==================================================
template = Template('Create the infrastructure needed to run the Connected Kingston Frontend')
template.add_version('2010-09-09')

# ==================================================
# Parameters.
# ==================================================
environment_parameter = template.add_parameter(
  Parameter(
    'Environment',
    Type='String',
    Description='The environment this stack is for (e.g. production or staging).',
    MinLength='1'
  )
)

# ==================================================
# Variables.
# ==================================================
ci_user_name_variable = Join('-', ['ci-frontend', Ref(environment_parameter)])

# ==================================================
# Resources.
# ==================================================
ci_user_resource = template.add_resource(
  iam.User(
    'CiUser',
    UserName=ci_user_name_variable,
    Policies=[
      iam.Policy(
        PolicyName='CiUserPolicy',
        PolicyDocument={
          'Version': '2012-10-17',
          'Statement': [
            {
              'Action': 'secretsmanager:GetSecretValue',
              'Effect': 'Allow',
              'Resource': '*'
            }
          ]
        }
      )
    ]
  )
)

# ==================================================
# Print the generated template in JSON.
# ==================================================
print(template.to_json())
