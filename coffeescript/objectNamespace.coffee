class ObjectNamespace
  namespace: (ns_string, value, returnValue) ->
    value = @_namespace ns_string, value
    return value if returnValue
    return @ if !returnValue
  _namespace: (ns_string, value) ->
    parts = ns_string.split('.')
    parent = @
    for i of parts
      if i < parts.length-1
        if parent[parts[i]] is undefined
          parent[parts[i]] = {}
      else
        if parent[parts[i]] is undefined
          parent[parts[i]] = value
      parent = parent[parts[i]]
    parent

object = new ObjectNamespace()
object.namespace 'Estimate.Model', 
  name:"Estimate"
object.namespace 'Estimate.Collection',
  name:"Estimates"
object.namespace 'Invoice.Model',
  name:"Invoice"
object.namespace 'Invoice.Collection', 
  name:"Invoice"
  attribute2: 'test'

console.log(object);
